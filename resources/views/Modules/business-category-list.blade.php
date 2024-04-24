@extends('layouts.admin')
@section('content')
<div class="container">

    <div class="input-group mb-3 d-flex justify-content-end">
        <a href="{{ route('addBusinessCategory')}}" class="btn btn-primary">Add Category</a> 
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category </h5>
            <table class="table table-bordered" id="city-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($businessCategoryList as $list)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $list['name']}}</td>
                            <td>
                                <a href="{{url('businessCategorydelete/'.base64_encode($list['id']))}}" class="delete-button">
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
