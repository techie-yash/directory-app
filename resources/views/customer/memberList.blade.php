@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Member Listing</h1>
            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="{{ route('addMember')}}" class="btn btn-primary">Add Member</a> 
            </div>
            <table class="table table-bordered" id="city-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$member['name']}}</td>  
                        <td>{{$member['title']}}</td>   
                        <td>{{$member['role']}}</td>
                        <td>
                            <a href="{{url('customer/memberdelete/'.base64_encode($member['id']))}}" class="delete-button">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="{{url('customer/memberUpdate/'.base64_encode($member['id']))}}" class="edits-button">
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
