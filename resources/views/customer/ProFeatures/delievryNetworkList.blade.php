@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Delievry Network Listing</h1>
            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="{{ route('addDelievryNetwork')}}" class="btn btn-primary">Add Delievry Network</a> 
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
                    @foreach($delievryNetworks as $delievryNetwork)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td> 
                        <img src="{{ $delievryNetwork['media'] ? url('/storage/media/' . $delievryNetwork['media']) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Image Alt Text" class="img-thumbnail" style="max-width: 300px; max-height: 100px;">
                        </td>   
                        <td>{{$delievryNetwork['title']}}</td>  
                        <td>
                        <a href="{{ route('deleteDelievry', ['id' => base64_encode($delievryNetwork['id'])]) }}" class="btn btn-primary">Delete Delivery</a>
                                
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
