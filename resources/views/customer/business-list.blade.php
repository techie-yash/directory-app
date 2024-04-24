@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Business Listing</h1>
            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="{{ route('addBusiness')}}" class="btn btn-primary">Add Business</a> 
            </div>
            <table class="table table-bordered" id="city-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Phone No</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($businesslist as $business)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$business['name']}}</td>   
                        <td>{{$business['country']}}</td>
                        <td>{{$business['phone_no']}}</td>  
                        <td>{{$business['email_address']}}</td>
                        <td>
                            <a href="{{url('customer/businessdelete/'.base64_encode($business['id']))}}" class="delete-button">
                                <i class="fas fa-trash"></i>
                            </a>

                            <a href="{{url('customer/viewBusinessdetails/'.base64_encode($business['id']))}}" class="edits-button">
                                <i class="fas fa-eye"></i>
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
