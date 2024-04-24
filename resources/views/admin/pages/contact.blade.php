@extends('layouts.admin')
 <!-- Assuming you have a layout file -->
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Contact Us</h5>
            <form action="{{ route('contact.submit') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="office_address">Office Address</label>
                <input type="text" class="form-control" id="office_address" name="office_address" value="{{ $contactUs->office_address }}">
                @error('office_address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $contactUs->email }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ $contactUs->phone }}">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="map_iframe">Map</label>
                <textarea class="form-control" id="map_iframe" name="map_iframe" rows="4">{{ $contactUs->map_iframe }}</textarea>
                @error('map_iframe')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
