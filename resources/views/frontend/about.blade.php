@extends('layouts.frontend')
@section('content')
<section class="pricing-banner" style="background-image: url('{{ url('assets/webpage/images/about-us-bg.png') }}');">
    <div class="container">
        <h1>About Us</h1>
    </div>
</section>
<section class="about-us-cont">
    <div class="container">
        <div class="about-us-inner">
            <div class="about-us-cont-lt">
                <h3>ABOUT US</h3>
                <h2>{{$aboutUs->about_us_title}}</h2>
                <p>{{$aboutUs->about_us_description}}.</p>
                <a href="{{ route('contacUs')}}">Contact us</a>
            </div>
            <div class="about-us-cont-rt"><img src="{{\App\Helpers\ImageHelper::imageUrl('help-business.png') }}" alt="Business"></div>
        </div>
    </div>
</section>
<section class="questions-contact">
    <div class="container">
        <div class="questions-contact-cont" style="background-image: url('{{ url('assets/webpage/images/contact-questions.png') }}');">
            <div class="questions-contact-cont-lt">
                <h3>Do You Have Any Questions ?</h3>
                <p>Nemo enim ipsam voluptatem quia voluptas hen an unknown printer took a galley wtnd scrambled it to makeive centuriesbut also.</p>
            </div>
            <div class="questions-contact-cont-rt"><a href="{{ route('contacUs')}}">CONTACT WITH US</a></div>
        </div>
    </div>
</section>
<section class="testimonials">
    <div class="container">
        <p>WHAT ARE OUR CLIENTS SAY</p>
        <h3>TESTIMONIALS</h3>
        <div class="testimonial-slides">
            <div class="testimonial-slide">
                <img src="{{\App\Helpers\ImageHelper::imageUrl('gold-stars.png') }}" alt="Stars">  
                <p>.. followed by some bogus content. Aenean commodo ligula egget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                <div class="user-details">
                    <div class="user-detail-lt"><img src="{{\App\Helpers\ImageHelper::imageUrl('person.png') }}" alt="person"></div>
                    <div class="user-detail-rt">
                        <h3>Olivia Green</h3>
                        <p>CEO, Company</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-slide">
                <img src="{{\App\Helpers\ImageHelper::imageUrl('gold-stars.png') }}" alt="Stars">  
                <p>.. followed by some bogus content. Aenean commodo ligula egget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                <div class="user-details">
                    <div class="user-detail-lt"><img src="{{\App\Helpers\ImageHelper::imageUrl('person.png') }}" alt="person"></div>
                    <div class="user-detail-rt">
                        <h3>Olivia Green</h3>
                        <p>CEO, Company</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-slide">
                <img src="{{\App\Helpers\ImageHelper::imageUrl('gold-stars.png') }}" alt="Stars">  
                <p>.. followed by some bogus content. Aenean commodo ligula egget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                <div class="user-details">
                    <div class="user-detail-lt"><img src="{{\App\Helpers\ImageHelper::imageUrl('person.png') }}" alt="person"></div>
                    <div class="user-detail-rt">
                        <h3>Olivia Green</h3>
                        <p>CEO, Company</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection