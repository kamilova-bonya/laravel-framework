<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        //$categories = DB::table('categories')->get();
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
        //все категории
    }

    public function show(Category $category)
    {
        //$category = DB::table('categories')->where('id', $id)->first();
        //$category = Category::findOrFail($id);

        //$posts = DB::table('posts')->where('category_id', $id)->get();
       // $posts = Post::query()->where('category_id', $category->id)->get();

        return view('categories.show', [
            'category' => $category
        ]);

        //посты 1 категории
    }
}
