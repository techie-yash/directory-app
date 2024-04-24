@extends('layouts.customer')
@section('content')

<div class="container">
    <h1>View Business Details</h1>
    <form action="{{ route('storeBusiness')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-4">
            <label>Business Logo</label>
            <img id="BusinessLogo" src="{{ $imageGallery->business_logo ? url('/storage/media/' . $imageGallery->business_logo) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
        </div>

        <!-- <div class="form-group mb-4">
            <label for="business_logo">Select  Image</label>
            <input type="file" id="business_logo" name="business_logo" class="form-control file-input" data-preview="#BusinessLogo">
        </div> -->

        <div class="form-group mb-4">
            <label>Cover page</label>
            <img id="coverImage" src="{{ $imageGallery->cover_image ? url('/storage/media/' . $imageGallery->cover_image) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
        </div>

        <!-- <div class="form-group mb-4">
            <label for="cover_image">Select  Image</label>
            <input type="file" id="cover_image" name="cover_image" class="form-control file-input" data-preview="#coverImage">
        </div> -->

        <div class="form-group mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Business Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Business Name" value="{{$imageGallery->name}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country Name" value="{{$imageGallery->country}}" readonly>
                </div>
            </div>
        </div>

        <div class="form-group mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="slogan">Slogan</label>
                    <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Enter slogan" value="{{$imageGallery->slogan}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="hq">Name Of The HQ</label>
                    <input type="text" class="form-control" id="hq" name="hq" placeholder="Enter HQ" value="{{$imageGallery->hq}}" readonly>
                </div>
            </div>
        </div>


        <div class="form-group mb-4">
            <label for="about">About</label>
            <textarea class="form-control" id="about" name="about" rows="4" placeholder="Enter text here.." readonly>{{$imageGallery->about}}</textarea>
        </div>

        <div class="form-group mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category" value="{{$imageGallery->category}}" readonly >
                </div>
                <div class="col-md-6">
                    <label for="sub_category">Sub-Category</label>
                    <input type="text" class="form-control" id="sub_category" name="sub_category" placeholder="Enter Sub-Category" value="{{$imageGallery->sub_category}}" readonly>
                </div>
            </div>
        </div>
        <div class="form-group mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="email_address">Email Address</label>
                    <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Enter Email Address" value="{{$imageGallery->email_address}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="phone_no">Phone No</label>
                    <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone No" value="{{$imageGallery->phone_no}}" readonly>
                </div>
            </div>
        </div>
        <div class="form-group mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="keywords">Keywords</label>
                    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Enter KeyWords" value="{{$imageGallery->keywords}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" id="website" name="website" placeholder="Enter Website" value="{{$imageGallery->website}}" readonly>
                </div>
            </div>
        </div>

        <div class="form-group mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{$imageGallery->address}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="whats_app_no">WhatsApp No </label>
                    <input type="text" class="form-control" id="whats_app_no" name="whats_app_no" placeholder="Enter WhatsApp No" value="{{$imageGallery->whats_app_no}}" readonly>
                </div>
            </div>
        </div>

        <div class="form-group mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="tax_no">Tax No</label>
                    <input type="text" class="form-control" id="tax_no" name="tax_no" placeholder="Enter Tax No" value="{{$imageGallery->tax_no}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="registration_no">Registration No </label>
                    <input type="text" class="form-control" id="registration_no" name="registration_no" placeholder="Enter Registration No" value="{{$imageGallery->registration_no}}" readonly>
                </div>
            </div>
        </div>

        <div class="form-group mb-4">
            <label>Tax Document</label>
            <img id="tax_doc" src="{{ $imageGallery->tax_doc_image ? url('/storage/media/' . $imageGallery->tax_doc_image) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
        </div>

        <!-- <div class="form-group mb-5">
            <label for="tax_doc_image">Select  Image</label>
            <input type="file" id="tax_doc_image" name="tax_doc_image" class="form-control file-input" data-preview="#tax_doc">
        </div> -->

        <div class="form-group mb-4">
            <label>Registration Doc</label>
            <img id="registration_doc" src="{{ $imageGallery->reg_doc_image ? url('/storage/media/' . $imageGallery->reg_doc_image) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
        </div>

        <!-- <div class="form-group mb-5">
            <label for="reg_doc_image">Select  Image</label>
            <input type="file" id="reg_doc_image" name="reg_doc_image" class="form-control file-input" data-preview="#registration_doc">
        </div> -->
        <div class="container">
            <h1 class="mt-5">Photos Gallary</h1>
             <!-- Display existing photos -->
            <div class="row">
            @foreach($imageGallery['imageGallery'] as $photo)
                <div class="col-md-3 mb-3">
                    <img src="{{ $photo['image'] ? url('/storage/media/' . $photo['image']) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Existing Image" class="img-thumbnail" style="max-height: 200px;">
                </div>
            @endforeach
            </div>
            <!-- <div class="form-group">
                <label>photos</label>
                <img id="businessPhotoGallary" src="" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
            </div> -->
            <!-- <div class="form-group mb-4">
                <label for="business_logo">Select  Image</label>
                <input type="file" id="business_photo_gallary" name="image" class="form-control file-input" data-preview="#businessPhotoGallary">
            </div> -->
        </div>
        <div class="text-center">
            <a href="{{ route('businessList')}}" class="btn btn-primary">Back</a>
        </div>
    </form>
</div>
@endsection
