@extends('layouts.frontend')
@section('content')
<div class="comm-banner">
    <img src="{{url('assets/webpage/images/about-us-banner.png')}}" alt="banner">
</div>

<section class="page-posts">
<div class="container">
    <div class="posts-list-cont">
        <div class="post-list">
            <div class="trending-comp-slide">
                <div class="trending-comp-slide-img">
                    <a href="">
                        <img src="{{url('assets/webpage/images/top-events-bg.png')}}" alt="Visa"> 
                    </a>
                    <div class="image-date">
                    <p>{{ \Carbon\Carbon::parse($eventView->start_date)->format('d') }}<span>{{ \Carbon\Carbon::parse($eventView->start_date)->format('M') }}</span></p>
                    </div>
                    <p>EVENTS</p>
                    <div class="explore-products-restaurants">
                        <a href="#">
                            <img src="{{url('assets/webpage/images/movie-stack.png')}}" alt="logo">  
                            <div class="restaurant-cont-details">
                                <h3>FINDI</h3>
                                <p>Restaurant</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="trend-slide-cont">
                    <div class="trend-inner-slide-cont">
                        <h4 class="heading"><a href="#"><i class="fa-regular fa-calendar-days"></i>{{$eventView['event']->user_event_type}}</a></h4>
                        <p class="description">{{$eventView->title}}</p>
                        <div class="loaction-des">
                            <i class="fa-solid fa-location-dot"></i>
                            <p>{{ $eventView->location}}</p>
                        </div>
                        <div class="phone-des">
                            <img src="{{url('assets/webpage/images/date.png')}}" alt="Phone">
                            <p>From {{ \Carbon\Carbon::parse($eventView->start_date)->format('m/d/Y') }} to {{ \Carbon\Carbon::parse($eventView->end_date)->format('m/d/Y') }} </p>
                        </div>
                    </div>
                    <div class="time-like">
                        <div class="time-des">
                            <i class="fa-regular fa-clock"></i>
                            <p>{{ \Carbon\Carbon::parse($eventView->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($eventView->end_time)->format('h:i A') }}</p>
                        </div>
                        @if(Auth::guard('User')->user())
                        <span class="heart"><i class="fa-solid fa-heart"></i></span>
                        @else
                        <span class="" onclick="showToastr()"><i class="fa-solid fa-heart"></i></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
<div>
</section>
<section class="newsletter">
    <div class="container">
        <div class="newsletter-cont">
            <div class="newsletter-cont-lt">
                <h3>Subscribe to our newsletter</h3>
                <p>Vestibulum consectetur placerat tellus. Sed faucibus<br>fermentum purus, at facilisis.</p>
            </div>
            <div class="newsletter-cont-rt">
                <div class="newsletter-cont-rt-form">
                    <img src="{{url('assets/webpage/images/Envelope.svg')}}" alt="envelope">  
                    <input type="text" placeholder="Email address">   
                    <a href="#">Subscribe</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection