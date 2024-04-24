@extends('layouts.user')
    @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
            <a href="index.html" class="logo d-flex align-items-center w-auto">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">User Register</span>
            </a>
        </div><!-- End Logo -->

        <div class="card mb-3">

            <div class="card-body">

            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                <p class="text-center small">Enter your personal details to create account</p>
            </div>

            <form class="row g-3 needs-validation" novalidate action="{{ route('storePanelRegister')}}" method="post">
                @csrf
                <div class="col-12">
                    <label for="yourName" class="form-label">Your Name</label>
                    <input type="text" name="name" class="form-control" id="yourName" required>
                    <div class="invalid-feedback">Please, enter your name!</div>
                </div>

                <div class="col-12">
                    <label for="yourEmail" class="form-label">Your Email</label>
                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                    <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                </div>

                <div class="col-12">
                <label for="yourUsername" class="form-label">Phone No</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" name="phone" class="form-control" id="yourUsername" required>
                    <div class="invalid-feedback">Please enter your phone.</div>
                </div>
                </div>

                <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                </div>
                <div>
                    <label for="gender">Gender:</label>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
                
                <div>
                    <label>Options:</label>
                    <div>
                        <input type="checkbox" id="food" name="food" value="food">
                        <label for="food">Food</label>
                    </div>
                    <div>
                        <input type="checkbox" id="lover" name="lover" value="lover">
                        <label for="lover">Lover</label>
                    </div>
                    <div>
                        <input type="checkbox" id="swimming" name="swimming" value="swimming">
                        <label for="swimming">Swimming</label>
                    </div>
                    <div>
                        <input type="checkbox" id="travel" name="travel" value="travel">
                        <label for="travel">Travel</label>
                    </div>
                    <div>
                        <input type="checkbox" id="hotels" name="hotels" value="hotels">
                        <label for="hotels">Hotels</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" id="age" name="age" placeholder="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="region">Region</label>
                            <input type="text" class="form-control" id="region" name="region" placeholder="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="" required>             
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                </div>
                <div class="col-12">
                    <p class="small mb-0">Already have an account? <a href="{{ route('userPanelLogin')}}">Log in</a></p>
                </div>
            </form>

            </div>
        </div>
        </div>
    </div>
</div>
@endsection