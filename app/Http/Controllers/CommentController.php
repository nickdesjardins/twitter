<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Idea $idea){

        request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->content = request()->content;
        $comment->user_id = auth()->id();
        $comment->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Comment posted successfully!');
    }
}
