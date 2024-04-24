@extends('layouts.customer')
@section('content')
@php
    $profileImage = Auth::guard('customers')->user();
@endphp
<div class="container">
    <div class="card">
        <div class="card-body">
                <h1>Update Profile</h1>
                <form method="POST" action="{{ route('profileUpdate') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Current Profile Image</label>
                        <img id="current_image" src="{{ $profileImage['profile_image'] ? url('/storage/profile_images/' . $profileImage['profile_image']) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                    </div>

                    <div class="form-group mb-5">
                        <label for="profile_image">Profile Image</label>
                        <input type="file" id="profile_image" name="profile_image" class="form-control">
                    </div>

                    <!-- Password Update -->

                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" id="new_password" name="new_password" placeholder="Enter New Password ..." class="form-control  @error('new_password') is-invalid @enderror">
                        @error('new_password')
                        <span class="invalid-feedback" role="alert">
                        {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm New Password..." class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                        {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
            </form>
        </div>
    <div>
</div>
@endsection
