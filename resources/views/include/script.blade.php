  <!-- Vendor JS Files -->
  <script src="{{url('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{url('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{url('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{url('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{url('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{url('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
  <!-- Template Main JS File -->
  <script src="{{url('assets/js/main.js')}}"></script>
  <script src="{{url('assets/js/custom.js')}}"></script>
  <script src="{{url('assets/js/livewire.js')}}"></script>

  <script>
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right"
    };
  </script>


@if(session('success'))
  <script>
      toastr.success('{{ session('success') }}', 'Success');
  </script>
@endif
@if(session('error'))
    <script>
        toastr.error('{{ session('error') }}', 'Error');
    </script>
@endif
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
  $(document).ready(function () {
  $('#category').change(function () {
      var categoryId = $(this).val();
      var url = '{{ route("getSubcategories", ":categoryId") }}';
      url = url.replace(':categoryId',categoryId);
      if (categoryId) {
          $.ajax({
            url: url,
            type: 'GET',
              dataType: 'json',
              success: function (data) {
                  $('#sub_category').removeAttr('disabled');
                  $('#sub_category').empty();
                  $('#sub_category').append('<option value="">Select Sub-Category</option>');
                  $.each(data, function (key, value) {
                      $('#sub_category').append('<option value="' + value.id + '">' + value.name + '</option>');
                  });
              }
          });
      } else {
          $('#sub_category').attr('disabled', 'disabled');
          $('#sub_category').empty();
          $('#sub_category').append('<option value="">Select Sub-Category</option>');
      }
  });
});
</script>