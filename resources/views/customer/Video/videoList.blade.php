@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Video Listing</h1>
            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="{{ route('addVideo')}}" class="btn btn-primary">Add Video</a> 
            </div>
            <table class="table table-bordered" id="city-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Video</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $video)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td> <video controls width="200" height="160">
                                <source src="{{url('/storage/videos/' . $video['video_path'])}}" type="video/mp4">
                                <!-- Your browser does not support the video tag. -->
                            </video>
                        </td>   
                        <td>{{$video['title']}}</td>  
                        <td>
                            <a href="{{url('/customer/deleteVideo/'.base64_encode($video['id']))}}" class="btn btn-primary">
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
