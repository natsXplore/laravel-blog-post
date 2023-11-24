<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userPost;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\post;

class home extends Controller
{
    public function index()
    {
        $userPost = UserPost::all();
        return view('user.index', ['userPost' => $userPost]);
    }
    public function viewHome(){
        $userPost = userPost::all();
        return view('user.index', compact('userPost'));
    }

    public function createPost(){
        return view('user.createPost');
    }
    public function editPost($id){
        $userPost = userPost::findOrFail($id);
        $userPostNew = userPost::all();
        return view('user.editPost', compact('userPost','userPostNew'));
    }
    public function userPost(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new userPost;
        $post->title = $request->input('title');
        $post->description = substr($request->input('description'), 0, 255);
        $post->author = $request->input('author');

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/images/', $filename);
            $post->image = $filename;
        }
        $post->save();
        return redirect()->route('user.blog')->with('alert-success', 'Post Added successfully');
        }

        public function postDetails($id){
            $userPost = userPost::find($id);
            return view('user.postDetails',compact('userPost'));
        }
        public function postDetailsDelete($id){
            $userPost = userPost::findOrFail($id);
            $userPost->delete();
            return redirect('/blog')->with('alert-success','Post has been deleted!');
        }
        public function updatePost(Request $request, $id)
        {
            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'author' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        
            $post = userPost::findOrFail($id);
        
            $post->title = $request->input('title');
            $post->description = substr($request->input('description'), 0, 255);
            $post->author = $request->input('author');
        
            if ($request->hasFile('image')) {
                if (Storage::disk('public')->exists('storage/images/' . $post->image)) {
                    Storage::disk('public')->delete('storage/images/' . $post->image);
                }
        
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->storeAs('images', $filename, 'public');
                $post->image = $filename;
            }
            $post->save();
            return redirect()->route('user.blog')->with('Updated', 'Blog post has been updated!');
        }
        
        
}
