@extends('layouts.admin')
 <!-- Assuming you have a layout file -->
@section('content')
<div class="container">
    <!-- Role Creation Form -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Manage Currency</h5>

                    <form action="" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('currency') is-invalid @enderror" placeholder="Enter Currency Name" name="currency" required>
                            @error('currency')
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
                <h5 class="card-title">Currency List</h5>
                <ul class="list-group">
                    @foreach($currencys as $currency)
                    <li class="list-group-item d-flex justify-content-between align-items-center mb-3">
                        {{ $currency['currency'] }}
                        <div>
                            <a href="{{url('/currencydelete/'.base64_encode($currency['id']))}}" class="btn btn-warning btn-sm">
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
