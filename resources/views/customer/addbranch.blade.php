@extends('layouts.customer')
    @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Add Branch</h1>
            <form action="{{ route('storeBranch')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="branchName">Branch Name</label>
                            <input type="text" class="form-control" id="branchName" name="branchName" placeholder="Enter Branch Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="branchNameArabic">Branch Name (Arabic)</label>
                            <input type="text" class="form-control" id="branchNameArabic" name="branchNameArabic" placeholder="Enter Branch Name (Arabic)" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="region">Region</label>
                            <input type="text" class="form-control" id="region" name="region" placeholder="Enter Region Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="City">City</label>
                            <input type="text" class="form-control" id="City" name="city" placeholder="Enter City Name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="Enter State Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street Name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="phone_no">Phone No</label>
                            <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone No" required>
                        </div>
                        <div class="col-md-6">
                            <label for="mobile">Mobile No</label>
                            <input type="text" class="form-control" id="mobile" name="mobile_no" placeholder="Enter Mobile No" required>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="WhatsApp">WhatsApp No</label>
                            <input type="text" class="form-control" id="WhatsApp" name="whatsapp_no" placeholder="Enter WhatsApp No" required>
                        </div>
                        <div class="form-group">
                            <label for="mapIframe">Map IFrame Code</label>
                            <textarea class="form-control" id="mapIframe" name="mapIframe" rows="4" placeholder="Enter Map IFrame Code" required></textarea>
                        </div>
                    </div>
                </div>
                <!-- Add more pairs of fields in the same manner -->

                <div class="form-group col-md-4">
                    <label for="zip">ZIP Code</label>
                    <input type="text" class="form-control" id="zip" name="zip_code" placeholder="Enter ZIP Code" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection