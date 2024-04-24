@extends('layouts.frontend')
@section('content')
<div class="comm-banner">
    <img src="{{url('assets/webpage/images/about-us-banner.png')}}" alt="banner">
</div>

<section class="page-posts">
    <div class="container">
        <div class="posts-list-cont">
            <div class="post-list">
                <div class="post-list-lt"><img src="{{url('assets/webpage/images/keb-vill.png')}}" alt="Kebab Village"></div>
                <div class="post-list-rt">
                    <h3>{{$postView->title}}</h3>
                    <div class="post-list-rt-views">
                        <img src="{{url('assets/webpage/images/eye.svg')}}" alt="eye">
                        <p>Views:{{$postView->views}}</p>
                    </div>
                    <img src="{{ $postView->image_path ? url('/storage/media/' . $postView->image_path) : url('https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg') }}" alt="Guy">
                    <p>{{$postView->Caption}}.
                        <br><br>{{$postView->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
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