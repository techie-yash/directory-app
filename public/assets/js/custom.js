// Image preview
$("#image").change(function () {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#image-preview").attr("src", e.target.result);
            $("#image-preview").show();
        };
        reader.readAsDataURL(this.files[0]);
    }
});

$("#profile_image").change(function () {
  if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $("#current_image").attr("src", e.target.result);
          $("#current_image").show();
      };
      reader.readAsDataURL(this.files[0]);
  }
});

//for coupon------------
$("#coupon_image").change(function () {
  if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $("#coupon").attr("src", e.target.result);
          $("#coupon").show();
      };
      reader.readAsDataURL(this.files[0]);
  }
});

//for Media------------
$("#media").change(function () {
  if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $("#media_image").attr("src", e.target.result);
          $("#media_image").show();
      };
      reader.readAsDataURL(this.files[0]);
  }
});

$("#media").change(function () {
  if (this.files && this.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var extension = this.files[0].name.split('.').pop().toLowerCase();
      if (extension === "pdf") {
        // If it's a PDF, display it in the iframe and hide the image
        $("#pdf_preview").attr("src", e.target.result);
        $("#pdf_preview").show();
        $("#image_preview").hide();
      } else {
        // If it's not a PDF, display it as an image and hide the iframe
        $("#image_preview").attr("src", e.target.result);
        $("#image_preview").show();
        $("#pdf_preview").hide();
      }
    };

    reader.readAsDataURL(this.files[0]);
  }
});

// togal button
const toggleButtons = document.querySelectorAll('button[data-bs-toggle]');
const deleteButtons = document.querySelectorAll('button[data-delete]');

toggleButtons.forEach(button => {
  button.addEventListener('click', () => {
    const id = button.getAttribute('data-bs-target').replace('#', '');
    const content = document.getElementById(id);
    content.style.display = content.style.display === 'none' ? 'block' : 'none';
  });
});

//preview image
function previewImage() {
  var input = document.getElementById('image');
  var preview = document.getElementById('image-preview');

  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
      };

      reader.readAsDataURL(input.files[0]);
  } else {
      preview.src = '';
      preview.style.display = 'none';
  }
}

//data tables
$(document).ready(function() {
  $('#city-table').DataTable();
});
$(document).ready(function() {
  $('#product-table').DataTable();
});


// preview video
document.addEventListener("DOMContentLoaded", function () {
  const videoFileInput = document.getElementById('video_file');
  const videoElement = document.getElementById('current_video');

  if (videoFileInput && videoElement) {
      videoFileInput.addEventListener('change', function (e) {
          // alert('File selected');
          const videoSource = URL.createObjectURL(e.target.files[0]);
          // Update the video source
          videoElement.src = videoSource;
          // Load and play the video
          videoElement.load();
          videoElement.play();
      });
  } else {
      console.log('Video file input or video element not found.');
  }
});

// Coupon Generate---------------------
$(document).ready(function () {
  $("#generateCoupon").click(function () {
      const couponCode = generateRandomCoupon();
      $("#generatedCoupon").val(couponCode);
  });

  function generateRandomCoupon() {
      const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      const couponLength = 10;
      let coupon = "";

      for (let i = 0; i < couponLength; i++) {
          const randomIndex = Math.floor(Math.random() * characters.length);
          coupon += characters.charAt(randomIndex);
      }

      return coupon;
  }
});


toastr.options = {
  "closeButton": true,
  "positionClass": "toast-top-right"
};


function updateCheckboxValue(checkbox) {
  const hiddenInput = checkbox.nextSibling; // Assuming hidden input is the next sibling
  if (checkbox.checked) {
      hiddenInput.value = "true";
  } else {
      hiddenInput.value = "false";
  }
}


// hide show password 
$(document).ready(function() {
    $("#show_hide_old_password, #show_hide_new_password").on("click", function() {
        var passwordField = $(this).closest(".form-group").find("input[type='password']");
        var eyeIcon = $(this).find("i");
        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
            eyeIcon.removeClass("fa-eye");
            eyeIcon.addClass("fa-eye-slash");
        } else {
            passwordField.attr("type", "password");
            eyeIcon.removeClass("fa-eye-slash");
            eyeIcon.addClass("fa-eye");
        }
    });
});

$(document).on('change', '.file-input', function () {
  if (this.files && this.files[0]) {
      var reader = new FileReader();
      var previewElement = $(this).data('preview');
      reader.onload = function (e) {
          $(previewElement).attr("src", e.target.result);
      };
      reader.readAsDataURL(this.files[0]);
  }
});

//business profile image gallary preview for multi-images 
document.addEventListener("DOMContentLoaded", function () {
  const fileInput = document.getElementById("business_photo_gallery");
  const selectedImages = document.getElementById("selectedImages");

  fileInput.addEventListener("change", function () {
      selectedImages.innerHTML = ""; // Clear previous previews
      const files = this.files;

      for (let i = 0; i < files.length; i++) {
          const image = document.createElement("img");
          image.src = URL.createObjectURL(files[i]);
          image.classList.add("img-thumbnail");
          image.style.maxHeight = "200px";
          selectedImages.appendChild(image);
      }
  });
});


