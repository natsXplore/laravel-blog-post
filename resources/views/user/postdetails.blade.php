@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        @if (session()->has('alert-success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('alert-success') }}
            </div>
        @endif
            @csrf
            <div class="mt-3 tm-post-link-inner text-center">
                <img src="{{ asset('storage/images/'.$userPost->image) }}" alt="Image"
                    class="img-fluid" style="max-width:100%;">
            </div>
            <h2 class="my-3"style="font-weight: 900">{{ $userPost->title }}</h2>
            <textarea class="form-control border-0" style="height: 120px" readonly>{{ $userPost->description }}</textarea>
            <div class="d-flex flex-column flex-sm-row justify-content-between mt-3 mb-4">
                <span><strong>Posted by:</strong> {{ $userPost->author }}</span>
                <span class="tm-color-primary mb-2 mb-sm-0"><strong>Date posted:</strong> {{ $userPost->created_at->format('F j, Y') }}</span>
            </div>
            @auth
            <input type="hidden" name="author"value="{{ Auth::user()->name }}">
            @if(Auth::user()->name == $userPost->author)
            
            <div class="d-flex justify-content-start mb-3">
                <a class="btn btn-sm btn-primary me-1" style="width: 90px;background-color:rgb(59, 99, 209);font-weight:500;" href="{{ route('user.editPost.edit',$userPost->id) }}">Edit</a>
                <form method="post" action="{{ route('user.postdetails.delete', $userPost->id) }}" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger" style="width: 90px;background-color:rgb(220, 38, 38);font-weight:500;">Delete</button>
                </form>
            @endif
            @endauth
            <a class="ms-1 btn btn-sm btn-dark" style="width: 90px;background-color:rgb(41, 41, 41);font-weight:500;" href="{{ route('user.index') }}">Back</a>
            </div>
          <livewire:comments :model="$userPost"/>
      </div>
    </div>
  </div>
@endsection

