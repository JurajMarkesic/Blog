<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()                                         //returns all categories
    {
        $categories = Category::all();

        return response()->json(['categories' => $categories]);
    }

    public function show(Category $category)                         //returns all posts for a specific category
    {
        $posts = $category->posts()->get();


        return view('Categories.category', ['posts' => $posts]);
    }

    public function store(Request $request)                        //creates a new category
    {
        $this->validate($request, [
            'title' => 'required|unique:categories'
        ]);

        $title = $request->input('title');

        $category = new Category();

        $category->title = $title;

        $category->save();

        return response('Category created.' ,200);
    }


    public function destroy(Category $category)                   //deletes a category
    {
        try {
            $category->delete();
        } catch (\Exception $e) {
            return response('Category does not exist.' ,404);
        }

        return response('Category deleted.' ,200);
    }
}
