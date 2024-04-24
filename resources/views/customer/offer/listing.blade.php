@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Offer Listing</h1>
            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="{{ route('addOffer')}}" class="btn btn-primary">Add Offer</a> 
            </div>
            <table class="table table-bordered" id="city-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Image</th>
                        <th>Coupon</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($offers as $offer)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td> 
                        <img src="{{ $offer['coupon_image'] ? url('/storage/profile_images/' . $offer['coupon_image']) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Image Alt Text" class="img-thumbnail" style="max-width: 300px; max-height: 100px;">
                        </td>   
                        <td>{{$offer['coupon']}}</td>  
                        <td>{{ str_replace('_', ' ', $offer['type']) }}</td>  
                        <td>
                            <a href="{{ url('customer/deleteOffer/'.base64_encode($offer['id']))}}" class="btn btn-primary">
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
