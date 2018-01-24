<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    public function search(Request $request){
        if($request->has('search')){

            $posts = Post::search($request->input('search'))->get();
        }
        return view('Search.results', compact('posts'));
    }
}
