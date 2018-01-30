<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)                             //stores a comment
    {
        $this->validate($request, [
            'username' => 'required|max:30',
            'body' => 'required',
            'post_id' => 'required'
        ]);

        $username = $request->input('username');
        $body = $request->input('body');
        $post_id = $request->input('post_id');

        $comment = new Comment();

        $comment->username = $username;
        $comment->body = $body;
        $comment->post_id = $post_id;

        $comment->save();

        return response("Comment stored.", 200);
    }

    public function show(Post $post)                                 //shows all comments for a specific post
    {
        $comments = $post->comments;

        return $comments;
    }

    public function destroy(Comment $comment)                       //deletes a comment
    {
        try {
            $comment->delete();
        } catch(\Exception $e) {
            report($e);
        }
    }


}
