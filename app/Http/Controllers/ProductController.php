<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all(); // Fetch categories for dropdown
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name.en' => 'required|string|max:255',
            'description.en' => 'nullable|string|max:1000',
            'url' => 'nullable|string', // Validate as a string (for JSON or PHP array format)
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Thumbnail is optional
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:1,0',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.en.required' => 'The English name is required.',
        ]);

        // Create a new product instance
        $product = new Product();

        // Handle file upload for the thumbnail
        if ($request->hasFile('thumbnail')) {
            $timestamp = time();
            $originalName = $request->file('thumbnail')->getClientOriginalExtension();
            $newFileName = 'product_' . $timestamp . '.' . $originalName;

            // Store the thumbnail directly in the public directory
            $request->file('thumbnail')->move(public_path('products'), $newFileName);
            $product->thumbnail = 'products/' . $newFileName;
        }

        // Set product fields
        $product->setTranslations('name', $request->name);
        $product->setTranslations('description', $request->description);
        $product->price = $request->price;
        $product->status = $request->status;
        $product->category_id = $request->category_id;

        // Handle the 'url' field (ensure it's properly encoded as JSON)
        if ($request->has('url')) {
            $urlValue = json_decode($request->url, true); // Convert string to array
            $product->url = json_encode($urlValue); // Encode the array back to JSON
        }

        // Save the product
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all(); // Fetch categories for dropdown
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        // Validate the request data
        $request->validate([
            'name.en' => 'required|string|max:255',
            'description.en' => 'nullable|string|max:1000',
            'url' => 'nullable|string', // Validate as a string (for JSON or PHP array format)
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Thumbnail is optional
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:1,0',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.en.required' => 'The English name is required.',
        ]);

        // Handle file upload if a new thumbnail is provided
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if it exists
            if ($product->thumbnail && file_exists(public_path($product->thumbnail))) {
                unlink(public_path($product->thumbnail));
            }
            // Generate a new filename with a timestamp
            $timestamp = time();
            $originalName = $request->file('thumbnail')->getClientOriginalExtension();
            $newFileName = 'product_' . $timestamp . '.' . $originalName;

            // Store the thumbnail directly in the public directory
            $request->file('thumbnail')->move(public_path('products'), $newFileName);
            $product->thumbnail = 'products/' . $newFileName;
        }

        // Update product fields
        $product->setTranslations('name', $request->name);
        $product->setTranslations('description', $request->description);
        $product->price = $request->price;
        $product->status = $request->status;
        $product->category_id = $request->category_id;

        $product->url = json_decode($request->url, true);
        // Save the product
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function imageupload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,mp4,mov,avi,wmv',
        ]);

        if ($request->hasFile('file')) {
            $timestamp = time();
            $originalName = $request->file('file')->getClientOriginalExtension();
            $filename = 'product_' . $timestamp . '.' . $originalName;

            // Store the thumbnail directly in the public directory
            $request->file('file')->move(public_path('products'), $filename);

            return response()->json([
                'success' => 1,
                'file' => [
                    'url' => asset('products/' . $filename),
                ]
            ]);
        }
        return response()->json(['success' => 0]);
    }

    public function imageshow($path)
    {
        $fullPath = public_path('products/' . $path);

        return response()->file($fullPath);
    }
}

