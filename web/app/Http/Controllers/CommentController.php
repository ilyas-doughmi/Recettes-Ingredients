<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function postComment(Request $request)
    {
        Comment::create([
            'userId' => Auth::id(),
            'comment' => $request->comment,
            'recetteid' => $request->recette
        ]);
        
        return redirect('/recipes');
    }
}
