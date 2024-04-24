@extends('layouts.customer')
    @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Add Post</h1>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                        <label>Add Photo</label>
                        <img id="coupon" src="https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                </div>

                <div class="form-group mb-5">
                    <label for="coupon_image">Select  Image</label>
                    <input type="file" id="coupon_image" name="image_path" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                </div>
                <div class="form-group">
                    <label for="Caption">Caption</label>
                    <input type="text" class="form-control" id="Caption" name="Caption" placeholder="Enter Caption" required>
                </div>

                <div class="form-group">
                    <label for="description">Small Description</label>
                    <textarea class="form-control" id="" name="description" rows="4" placeholder="Enter description" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection