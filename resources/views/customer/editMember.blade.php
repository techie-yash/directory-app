@extends('layouts.customer')
    @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Add Branch</h1>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                        <label>Personal Image</label>
                        <img id="current_image" src="{{ $editMember->profile_image ? url('/storage/profile_images/' . $editMember->profile_image) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                </div>

                <div class="form-group mb-5">
                    <label for="profile_image">Select Personal Image</label>
                    <input type="file" id="profile_image" name="profile_image" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name"> Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$editMember->name}}" placeholder="Enter Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$editMember->title}}" placeholder="Enter Title" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="region">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"  value="{{$editMember->phone}}" placeholder="Enter Phone No" required>
                        </div>
                        <div class="col-md-6">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{$editMember->mobile}}" placeholder="Enter Mobile No" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$editMember->email}}" placeholder="Enter Email Address" required>
                        </div>
                        <div class="col-md-6">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="administrator" @if(old('role', $editMember->role) == 'administrator') selected @endif>Administrator</option>
                                <option value="viewer" @if(old('role', $editMember->role) == 'viewer') selected @endif>Viewer</option>
                                <option value="editor" @if(old('role', $editMember->role) == 'editor') selected @endif>Editor</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$editMember->address}}" placeholder="Enter Address" required>
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