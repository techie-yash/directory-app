    @extends('layouts.admin')
    @section('content')
    <div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add City</h5>
            <form action="{{ route('storeCity') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">City Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" class="form-control-file" id="image" name="image" onchange="previewImage()">
            </div>

            <div class="form-group">
                <img id="image-preview" src="#" alt="Image Preview" style="max-width: 100%; display: none;">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
        


    </div>

@endsection