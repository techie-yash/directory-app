@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Magazine Listing</h1>
            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="{{ route('addMagzine')}}" class="btn btn-primary">Add Magazine </a> 
            </div>
            <table class="table table-bordered" id="city-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($magzines as $magzine)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$magzine['title']}}</td>  
                    <td>
                        <a href="{{url('/customer/deleteMagzine/'.base64_encode($magzine['id']))}}" class="btn btn-primary">
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
