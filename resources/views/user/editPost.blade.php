@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Update Post</h5>
        <form action="{{ route('user.editPost.update',$userPost->id) }}" method="post"enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="postTitle" class="form-label">Title</label>
              <input type="text" class="form-control" name="title" id="postTitle"  value="{{ $userPost->title }}"required>
            </div>
        
            <div class="mb-3">
                <label for="postDescription" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="postDescription" rows="3" required>{{ $userPost->description }}</textarea>
            </div>
            
            <div class="mb-3">
              <label for="postImage" class="form-label">Add Image</label>
              <input type="file" class="form-control" id="image" name="image"accept="image/*"onchange="validateFileSize()">
            </div>
            <input type="hidden" name="author"value="{{ Auth::user()->name }}">
            <button type="submit" class="btn btn-sm btn-primary" style="width: 90px;background-color:rgb(59, 99, 209);font-weight:500;">Update</button>
            <a class="ms-1 btn btn-sm btn-dark" style="width: 90px;background-color:rgb(41, 41, 41);font-weight:500;" href="{{ route('user.index') }}">Back</a>

          </form>
      </div>
    </div>
  </div>
@endsection

