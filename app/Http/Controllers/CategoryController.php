<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(int $id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        $posts = DB::table('posts')->where('category_id', $id)->get();

        return view('categories.show', [
            'posts' => $posts,
            'category' => $category
        ]);
    }
}
