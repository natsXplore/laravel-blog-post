@extends('layouts.main')
@section('content')
      <div class="container-fluid">
          <main class="tm-main">
            <div class="row">
              <h1 class="mt-5 mb-3" style="font-weight: 900">ALL POST</h1>
              @foreach ($userPost as $row)
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
                        <div class="d-flex justify-content-between mx-3 py-3">
                            <a class="btn btn-sm btn-primary" style="width: 80px;background-color:rgb(59, 99, 209);font-weight:500;" href="{{ route('user.postDetails',$row->id) }}">View</a>
                            <span><strong>Comments:</strong> {{$row->comments->count()}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </main>
      </div>
  @endsection