@extends('layouts.admin')
@section('content')
<div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Location Listing</h5>
                <div class="input-group mb-3 d-flex justify-content-end">
                    <a href="{{ route('location.add')}}" class="btn btn-primary">Add Location</a> 
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="" class="delete-button">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
