<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Berita;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function view_komentar_by_category($category)
    {

        $beritas = Berita::with(['comments.user'])->where('category', $category)->get();

        return view('dashboard.admin_' . strtolower($category) . '_lihatkomen', compact('beritas'));
    }


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

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('success', 'Comment deleted successfully');
    }
}
