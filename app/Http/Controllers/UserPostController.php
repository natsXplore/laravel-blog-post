<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userPost;

class UserPostController extends Controller
{
    public function index()
    {        
        $userPost = userPost::simplePaginate(5);
  
        return view('user.blog', compact('userPost'));
    }
    public function show($id)
    {
        $userPost = userPost::find($id);
   
        return response()->json($userPost);
    }
}
