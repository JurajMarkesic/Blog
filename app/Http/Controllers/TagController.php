<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return response()->json([
            'tags' => $tags
        ]);
    }

    public function store(Request $request)
    {
        $tag = new Tag();

        $name = $request->input('name');

        $tag->name = $name;

        $tag->save();

        return response("Tag stored.", 200);
    }

    public function attach(Request $request)
    {
        $tagId = $request->input('tag');
        $postId = $request->input('post');

        $tag = Tag::find($tagId);

        $tag->posts()->attach($postId);

        return response("Tag attached.", 200);
    }

    public function destroy(Request $request)
    {
        $name = $request->input('name');

        $tag =\DB::table('tags')->where('name', $name);

        $tag->delete();
    }
}
