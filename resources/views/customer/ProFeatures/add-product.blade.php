@extends('layouts.customer')
    @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Add Product</h1>
            <form action="{{ route('addProduct')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="role">Choose category</label>
                    <select class="form-control" id="role" name="type" required>
                        <option value="">select category</option>
                        @foreach($categorie as $category)
                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                </div>

                <div class="form-group">
                        <label>Add Photo</label>
                        <img id="coupon" src="https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                </div>

                <div class="form-group mb-5">
                    <label for="coupon_image">Select  Image</label>
                    <input type="file" id="coupon_image" name="media" class="form-control">
                </div>

                <div class="form-group">
                    <label for=""> Description</label>
                    <textarea class="form-control" id="" name="description" rows="4" placeholder="Enter description" required></textarea>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Phone No" required>
                        </div>
                        <div class="col-md-6">
                            <label for="before_price">Before Price</label>
                            <input type="text" class="form-control" id="before_price" name="before_price" placeholder="Enter Mobile No" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="discount_price">Discount Price</label>
                    <input type="text" class="form-control" id="discount_price" name="discount_price" placeholder="Enter Discount Price" required>
                </div>
                <div class="form-group">
                    <label for="discount_percentage">Discount Percentage</label>
                    <input type="text" class="form-control" id="discount_percentage" name="discount_percentage" placeholder="Enter Discount Percentage" required>
                </div>
                <div class="form-group">
                    <label for="until_date">Until date</label>
                    <input type="text" class="form-control" id="until_date" name="until_date" placeholder="Enter Until date" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>    
    </div>
</div>
@endsection