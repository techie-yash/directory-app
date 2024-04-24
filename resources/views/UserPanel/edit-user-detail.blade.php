@extends('layouts.user')
    @section('content')
        <div class="container">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Personal Information</h5>
              <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Phone No" required value="{{$userDetail['name']}}">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Mobile No" required value="{{$userDetail['email']}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone No" required value="{{$userDetail['phone']}}">
                            </div>
                            <div class="col-md-6">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Mobile No" required value="{{$userDetail['country']}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="region">Region</label>
                                <input type="text" class="form-control" id="region" name="region" placeholder="Enter Phone No" required value="{{$userDetail['region']}}">
                            </div>
                            <div class="col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter Mobile No" required value="{{$userDetail['city']}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="Enter Title" required value="{{$userDetail['age']}}">
                    </div>

                    <div>
                        <label for="gender">Gender:</label>
                        <input type="radio" id="male" name="gender" value="male"  @if($userDetail['gender'] == 'male') checked @endif>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female"  @if($userDetail['gender'] == 'female') checked @endif>
                        <label for="female">Female</label>
                    </div>

                    <div>
                        <label>Options:</label>
                        <div class="horizontal-checkboxes">
                            <div>
                                <input type="checkbox" id="food" name="food" value="food" @if($userDetail['food'] == 1) checked @endif>
                                <label for="food">Food</label>
                            </div>
                            <div>
                                <input type="checkbox" id="lover" name="lover" value="lover" @if($userDetail['lover'] == 1) checked @endif>
                                <label for="lover">Lower</label>
                            </div>
                            <div>
                                <input type="checkbox" id="swimming" name="swimming" value="swimming" @if($userDetail['swimming'] == 1) checked @endif>
                                <label for="swimming">Swimming</label>
                            </div>
                            <div>
                                <input type="checkbox" id="travel" name="travel" value="travel" @if($userDetail['travel'] == 1) checked @endif>
                                <label for="travel">Travel</label>
                            </div>
                            <div>
                                <input type="checkbox" id="hotels" name="hotels" value="hotels" @if($userDetail['hotels'] == 1) checked @endif>
                                <label for="hotels">Hotels</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                            <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </form>

            </div>
          </div>

          </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Change Password</h5>

                <form method="POST" action="{{ route('changePass')}}" class="mt-3">
                    @csrf
                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <div class="input-group">
                            <input type="password" name="old_password" id="old_password" placeholder="Enter Old Password" class="form-control" required>
                            <i id="eye_old_password" class="fa fa-eye"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for ="new_password">New Password</label>
                        <div class="input-group">
                            <input type="password" name="new_password" id="new_password" placeholder="Enter New Password" class="form-control" required>
                            <i id="eye_new_password" class="fa fa-eye"></i>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>

            </div>
        </div>


    </div>

@endsection