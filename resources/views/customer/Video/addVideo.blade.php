@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Add Video</h1>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Video</label>
                    <video id="current_video" controls>
                        <source src="" type="video/mp4">
                        <!-- Your browser does not support the video tag. -->
                    </video>
                </div>

                <div class="form-group mb-5">
                    <label for="video_file">Select Video</label>
                    <input type="file" id="video_file" name="video_file" class="form-control" accept="video/*">
                </div>

                <div class="form-group mb-5">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
