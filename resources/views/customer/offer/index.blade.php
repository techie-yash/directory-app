@extends('layouts.customer')
    @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Add Offer</h1>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                        <label>Add Photo</label>
                        <img id="coupon" src="https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                </div>

                <div class="form-group mb-5">
                    <label for="coupon_image">Select  Image</label>
                    <input type="file" id="coupon_image" name="coupon_image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                </div>

                <div class="form-group">
                    <label for="description">Small Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="role">Type</label>
                    <select class="form-control" id="role" name="type" required>
                        <option value="buy_one_get_one_free">Buy one get one free</option>
                        <option value="vouchers">Vouchers</option>
                        <option value="percentage">Percentage</option>
                        <option value="before_and_after">Before And After</option>
                    </select>
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

                <div class="form-group mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <label for="coupon">Coupon Code</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="generatedCoupon" name="coupon" placeholder="Generated Coupon">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary mr-2" id="generateCoupon">Generate</button>
                            </div>
                        </div>
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