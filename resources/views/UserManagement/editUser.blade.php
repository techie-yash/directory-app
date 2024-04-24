
<!DOCTYPE html>
<html lang="en">

<head>
<link href="{{url('assets/css/style.css')}}" rel="stylesheet">

  <!-- Favicons -->
  <link href="{{url('assets/img/favicon.png')}}" rel="icon">
  <link href="{{url('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
</head>

<body>
  @include('include.header')
   @include('include.sidebar')

  <main id="main" class="main">
  <div class="row">
            <div class="col-md-6">
                <h2>Update User Info</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        <img id="image-preview" src="{{ url('/storage/profile_images/' . $editUser['image']) }}" alt="Preview" style=" max-width: 200px; max-height: 200px;">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror   
                    </div>
                    <div class="form-row">
                        <div class="form-group col">    
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$editUser['name']}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$editUser['email']}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{$editUser['country']}}">
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{$editUser['address']}}">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$editUser['phone']}}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                            <option value="">Select Role</option>    
                            <option value="admin" @if(old('role', $editUser['role']) == 'admin') selected @endif>Administrator</option>
                            <option value="editor" @if(old('role', $editUser['role']) == 'editor') selected @endif>Editor</option>
                            <option value="viewer" @if(old('role', $editUser['role']) == 'viewer') selected @endif>Viewer</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                     </div>
                </form>
            </div>
        </div>
  </main>
  <footer id="footer" class="footer">
  @include('include.footer')
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="http://localhost/newproject/public/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="http://localhost/newproject/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="http://localhost/newproject/public/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="http://localhost/newproject/public/assets/vendor/echarts/echarts.min.js"></script>
  <script src="http://localhost/newproject/public/assets/vendor/quill/quill.min.js"></script>
  <script src="http://localhost/newproject/public/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="http://localhost/newproject/public/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="http://localhost/newproject/public/assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Template Main JS File -->
  <script src="http://localhost/newproject/public/assets/js/main.js"></script>
  <script src="http://localhost/newproject/public/assets/js/custom.js"></script>

</body>

</html>