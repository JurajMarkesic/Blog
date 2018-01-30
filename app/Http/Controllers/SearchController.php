<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class SearchController extends Controller
{
    public function search(Request $request){
        if($request->has('search')){

            $posts = Post::search($request->input('search'))->get();    //post search


            $tags = Tag::search($request->input('search'))->get();      //tag search

            if($tags->isNotEmpty()) {                                       //if a tag is found, every post from that tag is returned
                 $tagPosts = $tags->first()->posts;
                 foreach($tagPosts as $post) {
                     $posts->push($post);
                 }
            }
        }
        return view('Search.results', compact('posts'));
    }

}

