<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    public function index()
    {
        // Get categories and products for this tenant
        $categories = Category::has('products')->with([
            'products' => function ($query) {
                $query->where('status', true)->get();
            }
        ])->get();
        $products = Product::where('status', 1)->paginate(10);

        return view('storefront.index', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
    public function applications(Request $request)
    {
        $categories = Category::has('products')->with([
            'products' => function ($query) {
                $query->where('status', true)->get();
            }
        ])->get();
        $products = Product::where('status', 1)->paginate(10);

        return view('storefront.applications', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function search($category)
    {
        $cat = Category::where('slug', $category)->first();
        if (!$cat) {
            return redirect()->back();
        }
        $categories = Category::has('products')->with([
            'products' => function ($query) {
                $query->where('status', true)->get();
            }
        ])->get();
        $products = Product::where('status', 1)->where('category_id', $cat->id)->paginate(10);

        return view('storefront.applications', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function detail($category, $product)
    {
        $product = Product::where('slug', $product)->where('status', 1)->first();
        return view('storefront.detail', compact('product'));
    }

    public function about()
    {
        return view('storefront.about');
    }

    public function privacy()
    {
        return view('storefront.privacy');
    }

    public function support()
    {
        return view('storefront.support');
    }

    public function terms()
    {
        return view('storefront.terms');
    }
}
