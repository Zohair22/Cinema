<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        Comment::create($request->all());
        return back()->with(['success', 'Commented Successfully']);
    }
}
