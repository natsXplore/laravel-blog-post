<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userPost;
use Illuminate\Support\Facades\Auth;
class blog extends Controller
{
    public function viewBlog(){
        $userPost = userPost::all();
        $targetAuthor = Auth::check() ? Auth::user()->name : null;
        return view('user.blog', compact('userPost', 'targetAuthor'));
    }
}
