@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Add Business</h1>
            <form action="{{ route('storeBusiness')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Business Logo</label>
                    <img id="BusinessLogo" src="https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                </div>

                <div class="form-group mb-4">
                    <label for="business_logo">Select  Image</label>
                    <input type="file" id="business_logo" name="business_logo" class="form-control file-input" data-preview="#BusinessLogo">
                </div>

                <div class="form-group">
                    <label>Cover page</label>
                    <img id="coverImage" src="https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                </div>

                <div class="form-group mb-4">
                    <label for="cover_image">Select  Image</label>
                    <input type="file" id="cover_image" name="cover_image" class="form-control file-input" data-preview="#coverImage">
                </div>

                <div class="form-group mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Business Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Business Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country Name">
                            @error('country')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="slogan">Slogan</label>
                            <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Enter slogan">
                            @error('slogan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="hq">Name Of The HQ</label>
                            <input type="text" class="form-control" id="hq" name="hq" placeholder="Enter HQ">
                            @error('hq')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group mb-4">
                    <label for="about">About</label>
                    <textarea class="form-control" id="about" name="about" rows="4" placeholder="Enter text here.." ></textarea>
                    @error('about')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category" required>
                                @foreach($businessCategory as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="sub_category">Sub-Category</label>
                            <select class="form-control" id="sub_category" name="sub_category" disabled>
                                <option value="">Select Sub-Category</option>
                            </select>
                            @error('sub_category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form-group mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email_address">Email Address</label>
                            <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Enter Email Address">
                            @error('email_address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone_no">Phone No</label>
                            <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone No">
                            @error('phone_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="keywords">Keywords</label>
                            <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Enter KeyWords">
                            @error('keywords')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" name="website" placeholder="Enter Website">
                            @error('website')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="whats_app_no">WhatsApp No </label>
                            <input type="text" class="form-control" id="whats_app_no" name="whats_app_no" placeholder="Enter WhatsApp No">
                            @error('whats_app_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tax_no">Tax No</label>
                            <input type="text" class="form-control" id="tax_no" name="tax_no" placeholder="Enter Tax No">
                            @error('tax_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="registration_no">Registration No </label>
                            <input type="text" class="form-control" id="registration_no" name="registration_no" placeholder="Enter Registration No">
                            @error('registration_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label>Tax Document</label>
                    <img id="tax_doc" src="https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                </div>

                <div class="form-group mb-5">
                    <label for="tax_doc_image">Select  Image</label>
                    <input type="file" id="tax_doc_image" name="tax_doc_image" class="form-control file-input" data-preview="#tax_doc">
                </div>

                <div class="form-group mb-4">
                    <label>Registration Doc</label>
                    <img id="registration_doc" src="https://www.floatex.com/wp-content/uploads/2016/04/dummy-post-horisontal.jpg" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                </div>

                <div class="form-group mb-5">
                    <label for="reg_doc_image">Select  Image</label>
                    <input type="file" id="reg_doc_image" name="reg_doc_image" class="form-control file-input" data-preview="#registration_doc">
                </div>
                <div class="container">
                    <h1 class="mt-5">Photos Gallary</h1>
                    <div class="form-group">
                        <label for="business_photo_gallery">Select Images</label>
                        <input type="file" id="business_photo_gallery" name="images[]" class="form-control file-input" multiple>
                    </div>

                    <div class="form-group">
                        <label>Selected Images:</label>
                        <div id="selectedImages" class="d-flex flex-wrap"></div>
                    </div>
                    <!-- Preview area for selected images -->
                </div>

                <div class="container">
                    <h1 class="mt-5 mb-4">Set Working Hours</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Morning (AM)</th>
                                <th>Afternoon (PM)</th>
                                <th>Evening (pM)</th>
                                <th>Night (PM)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                            <tr>
                                <td>{{ $day }}</td>
                                <td>
                                    <select class="form-control" name="{{ strtolower($day) }}_morning">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}am">{{ $i }} AM</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="{{ strtolower($day) }}_afternoon">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}pm">{{ $i }} PM</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="{{ strtolower($day) }}_evening">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}am">{{ $i }} AM</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                <select class="form-control" name="{{ strtolower($day) }}_night">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}pm">{{ $i }} PM</option>
                                    @endfor
                                </select>
                            </td>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- <div class="container">
                    <h1 class="mt-5 mb-4">Set Holiday Hours</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Morning (AM)</th>
                                <th>Afternoon (PM)</th>
                                <th>Evening (PM)</th>
                                <th>Night (PM)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                            <tr>
                                <td>{{ $day }}</td>
                                <td>
                                    <select class="form-control" name="{{ strtolower($day) }}_morning">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}am">{{ $i }} AM</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="{{ strtolower($day) }}_morning_pm">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}pm">{{ $i }} PM</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="{{ strtolower($day) }}_afternoon">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}am">{{ $i }} AM</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="{{ strtolower($day) }}_afternoon_pm">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}pm">{{ $i }} PM</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> -->

                <div class="container mt-5">
                    <h1>Social Media Links</h1>
                        <div class="form-group">
                            <label for="facebook"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm8X1mEfjWbtV4xSEJA5S9mfCUoICzzIwnphMH7nSApA&s" alt="Facebook" width="30" height="30"></label>
                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook Link....">
                        </div>
                        <div class="form-group">
                            <label for="twitter"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQowLxgfJYbOszGm2gNxh3mO2v0BtmvvKoZ0MMN3A1Agw&s" alt="Twitter" width="30" height="30"></label>
                            <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter Link....">
                        </div>
                        <div class="form-group">
                            <label for="instagram"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUW8_2xflThAf1MA2NKFrZ5P6uc6T3yuMh4dfqyPpIDw&s" alt="Instagram" width="30" height="30"></label>
                            <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram Link....">
                        </div>
                        <div class="form-group">
                            <label for="youtube"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0SVNZ2A92EA0Y3G85R62OTV9DECgf7_1Nlv7aYkWk_w&s" alt="YouTube" width="30" height="30"></label>
                            <input type="text" class="form-control" id="youtube" name="youtube" placeholder="YouTube Link....">
                        </div>
                        <div class="form-group">
                            <label for="pinterest"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtLfPA1UnMS65LeNd3HGYW-9F-LXpp4KNgGLaIJXajNQ545_QODf7X&usqp=CAE&s" alt="Pinterest" width="30" height="30"></label>
                            <input type="text" class="form-control" id="pinterest" name="pinterest" placeholder="Pinterest Link....">
                        </div>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
