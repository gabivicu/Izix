<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{     
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(Request $request)
    {
        $request->validate(Comment::$rules);

        $comment = $request->input('content');
        $article = $request->input('article_id');
        $user = $request->input('user_id');
        
        $comment = $this->commentService->store([
            'comment' => $comment,
            'article_id' => $article,
            'user_id' => $user,
        ]);

        return redirect()->back();
    }

    public function deletedComments(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'deleted_comments' => 'required|integer',
        ]);
    
        $user = User::find($request->input('user_id'));
        $user->deleted_comments = $request->input('deleted_comments');
        $user->save();
    
        return response()->json(['message' => 'Deleted comments count updated successfully.']);
    }
}
