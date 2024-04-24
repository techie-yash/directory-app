@extends('layouts.admin')
@section('content')
    <!-- Your dashboard content goes here -->
    <div class="container mt-4">
        <!-- Add User Form -->
        <div class="row">
            <div class="col-md-6">
                <h2>Add User</h2>
                <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        <img id="image-preview" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror   
                    </div>
                    <div class="form-row">
                        <div class="form-group col">    
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country">
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                            <option value="">Select Role</option>    
                            <option value="admin">Administrator</option>
                            <option value="editor">Editor</option>
                            <option value="viewer">Viewer</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add User</button>
                        <div class="form-check form-check-inline ml-2">
                            <input type="checkbox" class="form-check-input" id="send_credentials" name="send_credentials">
                            <label class="form-check-label" for="send_credentials">Send Credentials</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- User Listing -->
        <div class="row mt-5">
            <div class="col-md-12">
                <h2>User Listing</h2>
                <!-- Structure for displaying a list of users -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Iterate through your user data and display it here -->
                        @forelse ($users as $user)
                        <tr>
                            <td>{{$user['name']}}</td>
                            <td>{{$user['email']}}</td>
                            <td>{{$user['country']}}</td>
                            <td>{{$user['role']}}</td>
                            <td><a href="{{url('/userUpdate/'.base64_encode($user['id']))}}" class="btn btn-warning btn-sm edit-user" data-id="{{$user['id']}}">
                                  <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="{{url('/userdelete/'.base64_encode($user['id']))}}" class="btn btn-warning btn-sm">
                                 <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        @empty
                        <p>No users found.</p>
                        @endforelse
                        <!-- Repeat the above row structure for each user -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
