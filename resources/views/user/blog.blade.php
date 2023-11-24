@extends('layouts.main')
@section('content')
      <div class="container-fluid">
          <main class="tm-main">
            <a class="btn btn-sm btn-primary mb-2 mt-3" style="width: 100px;background-color:rgb(59, 99, 209);font-weight:500;" href="{{ route('user.createPost.new') }}">Create New</a>
            <div class="row">
                @if (session()->has('alert-success'))
                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('alert-success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                  @endif
                  @if (session()->has('Updated'))
                  <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session()->get('Updated') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                    @endif
              <h1 class="mt-3 mb-3"style="font-weight: 900">USER POST</h1>
              @foreach ($userPost as $row)
              @if ($row->author == $targetAuthor)
              <div class="col-12 col-md-6 ">
                <div class="card text-center">
                    <img src="{{ asset('storage/images/'.$row->image) }}" alt="Image" class="img-fluid text-center"style="max-height: 430px;">
                    <div class="card-content">
                        <h4 style="font-weight: 600">{{ $row->title }}</h4>
                        <textarea class="form-control border-0" style="height: 120px" readonly>{{ $row->description }}</textarea>
                    </div>
                    <div class="d-flex flex-column flex-sm-row justify-content-between mx-3">
                        <span><strong>Posted by:</strong> {{ $row->author }}</span>
                        <span class="tm-color-primary"><strong>Date posted:</strong> {{ $row->created_at->format('F j, Y') }}</span>
                    </div>
                    <div class="card-read-mores">
                        <div class="d-flex justify-content-start mx-3 py-3">
                            <div class="d-flex mb-3">
                                <div class="p-1">
                                    <a class="me-1 btn btn-sm btn-primary" style="width: 90px;background-color:rgb(59, 99, 209);font-weight:500;" href="{{ route('user.postDetails',$row->id) }}">View</a>
                                </div>
                                <div class="p-1">
                                    <form method="post" action="{{ route('user.postdetails.delete', $row->id) }}" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger" style="width: 90px;background-color:rgb(220, 38, 38);font-weight:500;">Delete</button>
                                      </form>
                                </div>
                                <div class="ms-auto p-2">
                                    <span><strong>Comments:</strong> {{$row->comments->count()}}</span>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            </div>
        </main>
      </div>
  @endsection