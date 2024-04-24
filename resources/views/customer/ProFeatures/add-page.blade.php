@extends('layouts.customer')
    @section('content')
    <div class="container">
    <h1>Add Page</h1>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf

        
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection