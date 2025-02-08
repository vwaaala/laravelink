<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name.en' => 'required|string|max:255',
            'description.en' => 'nullable|string|max:1000',
        ], [
            'name.en.required' => 'The English name is required.',
        ]);

        $category = new Category();
        $category->setTranslations('name', $request->name);
        // $category->setTranslations('description', $request->description);
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name.en' => 'required|string|max:255',
            'description.en' => 'nullable|string|max:1000',
        ], [
            'name.en.required' => 'The English name is required.',
        ]);

        $category->setTranslations('name', $request->name);
        // $category->setTranslations('description', $request->description);
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}

