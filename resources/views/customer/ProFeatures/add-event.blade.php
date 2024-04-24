@extends('layouts.customer')
    @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Add Event</h1>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label> Image</label>
                        <img id="media_image" src="https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                </div>
                <div class="form-group mb-5">
                    <label for="media">Select  Image</label>
                    <input type="file" id="media" name="media" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role">Type</label>
                    <select class="form-control" id="role" name="type" required>
                    @foreach($events as $event)
                        <option value="{{$event['id']}}">{{$event['user_event_type']}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="start-date">Start Date</label>
                            <input type="date" class="form-control" id="start-date" name="start_date" placeholder="Enter Start Date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Enter End Date" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="start-time">Start Time</label>
                            <input type="time" class="form-control" id="start-time" name="start_time" placeholder="Enter Start Time" required>
                        </div>
                        <div class="col-md-6">
                            <label for="end_time">End Time</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" placeholder="Enter End Time" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                        </div>
                        <div class="col-md-6">
                            <label for="MapIframe">MapIframe</label>
                            <input type="text" class="form-control" id="MapIframe" name="mapiframe" placeholder="Enter MapIframess" required>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>    
    </div>
</div>
@endsection