<?php

namespace App\Http\Controllers;

use App\Events\PageViewed;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show', 'popular', 'recent']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)                                 //returns all posts
    {

        $posts = Post::orderBy('created_at', 'desc')->paginate(5);


        return response()->json([
            'posts' => $posts, 'msg' => 'Posts fetched!']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()                                                //renders view for creating a post
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('create', ['tags' => $tags, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)                             //stores a post
    {
        $this->validate($request, [
            'title' => 'required|unique:posts',
            'body' => 'required',
            'category' => 'required'
        ]);


        $title = $request->input('title');
        $body = $request->input('body');
        $category = $request->input('category');

        $post = new Post();

        $post->title = $title;
        $post->body = $body;
        $post->category = $category;

        $post->save();

        $tags = $request->input('tags');

        foreach($tags as $tag) {

            $post->tags()->attach($tag);
        }

        return response()->json(['id' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)                        //renders a view to show a post
    {
        event(new PageViewed($post));

        return view('post')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)                //renders a view to edit a post
    {
        $categories = Category::all();
        $tags = Tag::all();

        $tagsSelected = $post->tags;

        return view('edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags, 'tagsselected' => $tagsSelected]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)        //updates a post
    {
        $this->validate($request, [
            'title' => 'required|unique:posts',
            'body' => 'required',
            'category' => 'required'
        ]);

        $title = $request->input('title');
        $body = $request->input('body');
        $category = $request->input('category');


        $post->title = $title;
        $post->body = $body;
        $post->category = $category;

        $post->update();

        $tags = $request->input('tags');

        $post->tags()->detach();

        foreach($tags as $tagId) {
            $tag = Tag::find($tagId);
            $post->tags()->attach($tag);
        }

        return response("Post updated!" , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)             //deletes a post
    {
        try {
            $post->delete();
        } catch (\Exception $e) {
            return response("Post doesn't exist.", 404);
        }

        return response("Post deleted!", 200);
    }

    public function popular()                   //returns posts with the most views
    {
        $posts = Post::orderBy('views', 'desc')->take(5)->get();

        return response()->json(['posts' => $posts]);
    }

    public function recent()                    //returns most recently created posts
    {
        $posts = Post::orderBy('created_at', 'desc')->take(5)->get();

        return response()->json(['posts' => $posts]);
    }

}
