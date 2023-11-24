
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            @if (session()->has('alert-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('alert-success') }}
                </div>
            @endif
            <h5 class="card-title fw-semibold mb-4">New Comment</h5>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Assuming you have a userPost ID to associate the comment with a post --}}
                {{-- <input type="hidden" name="userPost_id" value="{{ $userPost->id }}"> --}}
                
                <div class="mb-3">
                    <label for="commentContent" class="form-label">Comment</label>
                    <textarea class="form-control" name="content" id="commentContent" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
        </div>
    </div>
</div>