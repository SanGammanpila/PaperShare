<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request,$article_id)
    {
        
        $comment = new Comment;
        $comment->article_id = $article_id;
        $comment->user_id = Auth::id();
        $comment->body = $request->input('comment_body');
        
        $comment->save();
        return $comment;
    }
}
