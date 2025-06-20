<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ], [
            'name.unique' => 'Категория с таким названием уже существует'
        ]);

        try {
            Category::create(['name' => $validated['name']]);
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Ошибка: ' . $e->getMessage());
        }

        return redirect()->route('admin.categories.index')
            ->with('success', 'Категория создана!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
        ], [
            'name.unique' => 'Категория с таким названием уже существует'
        ]);

        $category->update(['name' => $validated['name']]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Категория обновлена!');
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $e) {
            return redirect()->route('admin.categories.index')
                ->with('danger', 'Ошибка удаления категории: ' . $e->getMessage());
        }

        return redirect()->route('admin.categories.index')
            ->with('success', 'Категория удалена!');
    }
}
