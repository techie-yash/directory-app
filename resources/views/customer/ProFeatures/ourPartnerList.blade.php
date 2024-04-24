@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Our Partner Listing</h1>
            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="{{ route('addPartner')}}" class="btn btn-primary">Add Partner</a> 
            </div>
            <table class="table table-bordered" id="city-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Image</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ourPartners as $ourPartner)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td> 
                        <img src="{{ $ourPartner['media'] ? url('/storage/media/' . $ourPartner['media']) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Image Alt Text" class="img-thumbnail" style="max-width: 300px; max-height: 100px;">
                        </td>   
                        <td>{{$ourPartner['title']}}</td>  
                        <td>
                            <a href="{{ route('deletePartner', ['id' => base64_encode($ourPartner['id'])]) }}" class="btn btn-primary">
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
