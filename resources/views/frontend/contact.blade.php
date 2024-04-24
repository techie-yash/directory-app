@extends('layouts.frontend')
@section('content')
<section class="pricing-banner" style="background-image: url('{{ url('assets/webpage/images/contact-us-bg.png') }}');">
    <div class="container">
        <h1>Contact Us</h1>
    </div>
</section>
<div class="contact-us-cont">
    <div class="container">
        <div class="contact-us-lt">
            <h3>Contact Info</h3>
            <ul>
                <li><b>Address:</b>3271 Masjed Salman, حي الاندلس، 8154، Jeddah 23325, Saudi Arabia</li>
                <li><b>Phone:</b><a href="#">0096612334567</a></li>
                <li><b>Email:</b><a href="#">info@alamoody.com</a></li>
            </ul>
            <div class="social-media">
                <h3>Social Media</h3>
                <ul>
                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-google-plus-g"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-skype"></i></a></li>
                    <li><a href="#"><i class="fa-solid fa-globe"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-skype"></i></a></li>
                    <li><a href="#"><i class="fa-solid fa-globe"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="contact-us-rt">
            <h3>Get in Touch with Us</h3>
            <p>Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.Reference site about Lorem Ipsum,</p>
            <form action="#">
                <div class="form-fields">
                    <div class="field">
                        <label for="fullname">Full name</label>
                        <input type="text" name="fullname" id="fullname">
                    </div>
                    <div class="field">
                        <label for="country">Country</label>
                        <input type="text" name="country" id="country">
                    </div>
                    <div class="field">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="field">
                        <label for="phone">Phone number</label>
                        <input type="text" name="phone" id="phone">
                    </div>
                </div>
                <div class="field message-textarea">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="5"></textarea>
                </div>
                <a href="#">Submit</a>
            </form>
        </div>
    </div>
</div>
<div class="contact-us-map">
    <img src="{{\App\Helpers\ImageHelper::imageUrl('contact-map.png') }}" alt="">
</div>
@endsection