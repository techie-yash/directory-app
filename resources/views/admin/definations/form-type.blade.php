@extends('layouts.admin')
 <!-- Assuming you have a layout file -->
@section('content')
<div class="container">
    
    <!-- Role Creation Form -->
    <div class="row">
        <div class="col-md-6">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Manage Form Type</h5>

              <form action="" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('user_form_type') is-invalid @enderror" placeholder="Enter Form Type Name" name="user_form_type" required>
                    @error('user_form_type')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Add</button>
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
              <h5 class="card-title">Form List</h5>
              <ul class="list-group">
                @foreach($forms as $form)
                <li class="list-group-item d-flex justify-content-between align-items-center mb-3">
                    {{ $form['user_form_type'] }}
                    <div>
                        <a href="{{url('/formdelete/'.base64_encode($form['id']))}}" class="btn btn-warning btn-sm">
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
