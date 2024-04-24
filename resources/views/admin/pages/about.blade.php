@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">About Us</h5>
            <!-- About Us Form -->
            <form method="POST" action="{{ route('about.update') }}">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->

                <!-- About Us Title -->
                <div class="mb-3">
                    <label for="about_us_title" class="form-label fw-bold">Page Title</label>
                    <input class="form-control" id="about_us_title" name="about_us_title" type="text" value="{{ $aboutUs->about_us_title }}" required></textarea>
                </div>

                <!-- About Us Description -->
                <div class="mb-3">
                    <label for="about_us_description" class="form-label fw-bold">Page Description</label>
                    <textarea class="form-control" id="about_us_description" name="about_us_description" rows="3" required>{{ $aboutUs->about_us_description }}</textarea>
                </div>

                <!-- Who We Are -->
                <div class="mb-3">
                    <label for="who_we_are" class="form-label fw-bold">Who We Are</label>
                    <textarea class="form-control" id="who_we_are" name="who_we_are" rows="3" required>{{ $aboutUs->who_we_are }}</textarea>
                </div>

                <!-- Service 1 -->
                <div class="mb-3">
                    <label for="service1" class="form-label fw-bold">Service 1</label>
                    <textarea class="form-control" id="service1" name="service1" rows="2" required>{{ $aboutUs->service1 }}</textarea>
                </div>

                <!-- Service 2 -->
                <div class="mb-3">
                    <label for="service2" class="form-label fw-bold">Service 2</label>
                    <textarea class="form-control" id="service2" name="service2" rows="2" required>{{ $aboutUs->service2 }}</textarea>
                </div>

                <!-- Service 3 -->
                <div class="mb-3">
                    <label for="service3" class="form-label fw-bold">Service 3</label>
                    <textarea class="form-control" id="service3" name="service3" rows="2" required>{{ $aboutUs->service3 }}</textarea>
                </div>

                <div class="text-center mt-3"> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
