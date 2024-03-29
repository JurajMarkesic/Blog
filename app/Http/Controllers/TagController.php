<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['store', 'attach', 'destroy']]);
    }

    public function index()                  //returns all tags
    {
        $tags = Tag::all();

        return response()->json([
            'tags' => $tags
        ]);
    }

    public function store(Request $request)         //stores a new tag
    {
        $this->validate($request, [
            'name' => 'required|unique:tags'
        ]);

        $tag = new Tag();

        $name = $request->input('name');

        $tag->name = $name;

        $tag->save();

        return response("Tag stored.", 200);
    }

    public function attach(Request $request)                //adds a tag to a post
    {
        $tagId = $request->input('tag');
        $postId = $request->input('post');

        $tag = Tag::find($tagId);

        $tag->posts()->attach($postId);

        return response("Tag attached.", 200);
    }

    public function destroy(Tag $tag)                       //deletes a tag
    {
        try {
            $tag->delete();
        } catch (\Exception $e) {
            return response('Tag does not exist.', 404);
        }
    }
}
