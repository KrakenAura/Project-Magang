<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = auth()->id();
        $comment->content = $request->content;
        $comment->save();

        return back();
    }


    public function reply(Request $request, $commentId)
    {
        $reply = new Comment();
        $reply->news_id = Comment::find($commentId)->news_id;
        $reply->user_id = auth()->id();
        $reply->parent_id = $commentId;
        $reply->content = $request->content;
        $reply->save();

        return back();
    }
}
