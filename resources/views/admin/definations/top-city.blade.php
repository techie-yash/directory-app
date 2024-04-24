@extends('layouts.admin')
@section('content')
<div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">City Listing</h5>
                <div class="input-group mb-3 d-flex justify-content-end">
                    <a href="{{ route('addCity.submit')}}" class="btn btn-primary">Add City</a> 
                </div>
                <table class="table table-bordered" id="city-table">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cities as $city)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $city->name }}</td>
                            <td>
                                <a href="{{ route('cityDestroy', ['id' => base64_encode($city->id)]) }}" class="delete-button">
                                    <i class="fas fa-trash"></i>
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
