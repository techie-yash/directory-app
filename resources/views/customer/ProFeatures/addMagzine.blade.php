@extends('layouts.customer')
    @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Add Magazine</h1>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label> Image</label>
                    <img id="media_image" src="https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg" alt="Current Image" class="img-thumbnail pdf" style="max-height: 200px;">
                </div>

                <div class="form-group mb-5">
                    <label for="media">Select  Image</label>
                    <input type="file" id="media" name="media" class="form-control">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="start-date">Start Date</label>
                            <input type="date" class="form-control" id="start-date" name="start_date" placeholder="Enter Phone No" required>
                        </div>
                        <div class="col-md-6">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Enter Mobile No" required>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection