@extends('layouts.admin')
 <!-- Assuming you have a layout file -->
@section('content')
<div class="container">


    <!-- Role Creation Form -->
    <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Manage User Interests</h5>
              <form action="" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('user_interests') is-invalid @enderror" placeholder="Enter Intrests Name" name="user_interests" required>
                    @error('user_interests')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Add </button>
                </div>
            </form>
            </div>
          </div>

        </div>
    </div>


    <!-- List of Stored Roles -->
    <div class="row mt-4">
        <div class="col-md-6">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Interests List</h5>
              <ul class="list-group">
                @foreach($interests as $interest)
                <li class="list-group-item d-flex justify-content-between align-items-center mb-3">
                    {{ $interest['user_interests'] }}
                    <div>
                        <a href="{{url('/interestsdelete/'.base64_encode($interest['id']))}}" class="btn btn-warning btn-sm">
                            <i class="bi bi-trash"></i> Delete
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
            </div>
          </div>
        </div>
    </div>   
</div>
@endsection
