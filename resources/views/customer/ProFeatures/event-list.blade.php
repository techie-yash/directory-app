@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Event Listing</h1>
            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="{{ route('addEvent')}}" class="btn btn-primary">Add Event</a> 
            </div>
            <table class="table table-bordered" id="city-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>location</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($eventList as $event)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$event['title']}}</td>  
                    <td>{{$event['location']}}</td>  
                    <td>{{$event['start_date']}}</td>  
                    <td>{{$event['end_date']}}</td>  
                    <td>
                        <a href="{{url('/customer/deleteEvent/'.base64_encode($event['id']))}}" class="btn btn-primary">
                            Delete
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