@extends('layouts.admin')
 <!-- Assuming you have a layout file -->
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Manage Roles</h5>

                        <form action="" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('role') is-invalid @enderror" placeholder="Enter Role Name" name="role" required>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Add Role</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
          </div>
          <div class="row mt-4">
                    <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Roles List</h5>

                        <ul class="list-group">
                            @foreach($roles as $role)
                            <li class="list-group-item d-flex justify-content-between align-items-center mb-3">
                                {{ $role['role'] }}
                                <div>
                                    <a href="" class="btn btn-warning btn-sm edit-user" data-id="">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{url('/roledelete/'.base64_encode($role['id']))}}" class="btn btn-warning btn-sm">
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


    <!-- Role Creation Form -->


   <!-- List of Stored Roles -->
  </div>
@endsection
