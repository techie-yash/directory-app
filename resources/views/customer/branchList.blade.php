@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Branch Listing</h1>
            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="{{ route('addBranch.submit')}}" class="btn btn-primary">Add Branch</a> 
            </div>
            <table class="table table-bordered" id="city-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Region</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($branches as $branch)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$branch['branchName']}}</td>   
                        <td>{{$branch['region']}}</td>
                        <td>{{$branch['city']}}</td>  
                        <td>{{$branch['state']}}</td>
                        <td>
                            <a href="{{url('customer/branchdelete/'.base64_encode($branch['id']))}}" class="delete-button">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="{{url('customer/branchUpdate/'.base64_encode($branch['id']))}}" class="edits-button">
                                <i class="fas fa-pencil"></i>
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
