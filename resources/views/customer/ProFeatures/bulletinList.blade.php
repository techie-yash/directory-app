@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Bulletin Listing</h1>
            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="{{ route('addBulletin')}}" class="btn btn-primary">Add </a> 
            </div>
            <table class="table table-bordered" id="city-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Image</th>
                        <th>website</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bulletins as $bulletin)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td> 
                    <img src="{{ $bulletin['media'] ? url('/storage/media/' . $bulletin['media']) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Image Alt Text" class="img-thumbnail" style="max-width: 300px; max-height: 100px;">
                    </td>   
                    <td>{{$bulletin['title']}}</td>  
                    <td>
                        <a href="{{url('/customer/deleteBulletin/'.base64_encode($bulletin['id']))}}" class="btn btn-primary">
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
