@extends('layouts.frontend')
@section('content')
<section class="pricing-banner" style="background-image: url('{{ url('assets/webpage/images/contact-us-bg.png') }}');">
    <div class="container">
        <h1>Advertise with us</h1>
    </div>
</section>
<section class="advertise-with-us">
    <div class="container">
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
                        <label for="Store Name">Store Name</label>
                        <input type="text" name="country" id="country">
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="field">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="phone" id="phone">
                    </div>
                    <div class="field">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="field">
                        <label for="mobile">Number of impressions</label>
                        <input type="text" name="phone" id="phone">
                    </div>
                    <div class="field">
                        <label for="email">Start Date</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="field">
                        <label for="period">Period</label>
                        <input type="text" name="phone" id="phone">
                    </div>
                </div>
                <div class="field message-textarea">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="5"></textarea>
                </div>
                <div class="upload-img">
                    <input type="file" id="myFile" name="filename">
                    <p>*image size should be 1280*300px</p>
                </div>
                <a href="#">Submit</a>
            </form>
        </div>
    </div>
</section>
@endsection