@extends('layouts.admin')
 <!-- Assuming you have a layout file -->
@section('content')
<div class="container">

    <!-- Role Creation Form -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Manage Event Type</h5>
                <form action="" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('user_event_type') is-invalid @enderror" placeholder="Enter Event Name" name="user_event_type" required>
                        @error('user_event_type')
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
                <h5 class="card-title">Event List</h5>
                <ul class="list-group">
                    @foreach($events as $event)
                    <li class="list-group-item d-flex justify-content-between align-items-center mb-3">
                        {{ $event['user_event_type'] }}
                        <div>
                            <a href="{{url('/eventsdelete/'.base64_encode($event['id']))}}" class="btn btn-warning btn-sm">
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
