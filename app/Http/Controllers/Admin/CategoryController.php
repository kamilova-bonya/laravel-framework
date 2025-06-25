<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        try {
            Category::create($validated);
        } catch (\Exception $exception) {
            return redirect()->route('admin.categories.create')
                ->with('error', 'Ошибка добавления категории! ' . $exception->getMessage());
        }

        return redirect()->route('admin.categories.index')
            ->with('success', 'Категория добавлена!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:50|unique:categories,name,' . $category->id,
        ]);

        $category->fill($validated);
        $category->save();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Категория обновлена!');
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория удалена!');
        } catch (\Exception $exception) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Ошибка удаления категории! ' . $exception->getMessage());
        }
    }
}
