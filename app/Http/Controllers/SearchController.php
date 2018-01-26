<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class SearchController extends Controller
{
    public function search(Request $request){
        if($request->has('search')){

            $posts = Post::search($request->input('search'))->get();


            $tags = Tag::search($request->input('search'))->get();

            if($tags->isNotEmpty()) {
                 $tagPosts = $tags->first()->posts;
                 foreach($tagPosts as $post) {
                     $posts->push($post);
                 }
            }
        }
        return view('Search.results', compact('posts'));
    }

}

