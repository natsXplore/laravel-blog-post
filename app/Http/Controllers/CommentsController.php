<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'userPost_id' => 'required|exists:user_posts,id',
        'content' => 'required|max:255',
    ]);

    // Your comment creation logic here...

    return redirect()->back()->with('alert-success', 'Comment added successfully');
}

}
