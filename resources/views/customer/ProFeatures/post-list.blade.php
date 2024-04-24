@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Post Listing</h1>
            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="{{ route('addPost')}}" class="btn btn-primary">Add Post </a> 
            </div>
            <table class="table table-bordered" id="city-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Caption</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td> 
                            <img src="{{ $post['image_path'] ? url('/storage/media/' . $post['image_path']) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Image Alt Text" class="img-thumbnail" style="max-width: 300px; max-height: 100px;">
                            </td>   
                            <td>{{$post['title']}}</td>
                            <td>{{$post['description']}}</td>
                            <td>
                                <a href="{{url('/customer/deletePost/'.base64_encode($post['id']))}}" class="btn btn-primary">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
