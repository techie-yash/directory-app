<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- Include Bootstrap 5 JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM2AJRdt0cr7MkEgZ5TbK_Pq0yuxyzAKY&libraries=places&callback=initMap" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>

<!-- Your custom script -->
<script src="{{url('assets/webpage/script.js')}}"></script>

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
    $(document).ready(function () {
    $('#language-btn').on('click', function (event) {
        event.stopPropagation(); // Prevent the event from bubbling up to the document
        $('#language-options').toggle();
    });

    $('.language-option').on('click', function () {
        var langCode = $(this).data('lang');
        var langName = $(this).text();

        var selectedLanguageIcon = $(this).find('.flag-icon').clone();
        $('#selected-language-icon').empty().append(selectedLanguageIcon);
        $('#selected-language').text(langName);
        $('.language-option').removeClass('selected');
        $(this).toggleClass('selected');
        $('#language-options').hide();
    });

    $(document).on('click', function (event) {
        var languageDropdown = $('.language-dropdown');
        if (!languageDropdown.is(event.target) && languageDropdown.has(event.target).length === 0) {
            $('#language-options').hide();
        }
    });
});

    
</script>


<script>
    function toggleMap() {
        $('#map').toggle();

        if ($('#map').is(':visible')) {
            initMap();
        }
    }

    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 8,
        });
    }
</script>


<script>
    $(document).ready(function() {
        $('.star').on('click', function() {
            const value = $(this).data('value');

            $('.star i').removeClass('selected');

            $('.star').each(function() {
                const starValue = $(this).data('value');
                if (starValue <= value) {
                    $(this).find('i').addClass('selected');
                }
            });

            $('.publish-btn').data('rating', value);
        });
    });

    function publishReview() {
        const rating = $('.publish-btn').data('rating');
        const reviewText = $('#review-text').val();
        const productId = $('input[name="product_id"]').val();

        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{ route('addReview')}}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            data: {
                product_id: productId,  
                rating: rating,
                review: reviewText,
            },
            success: function(response) {
                console.log(response.message);

                Swal.fire({
                    title: 'Review Added Successfully',
                    icon: 'success',
                    timer: 3000, 
                    showConfirmButton: false, 
                    showClass: {
                        popup: 'animate__animated animate__fadeIn' 
                    },
                    didOpen: () => {
                        Swal.showValidationMessage('Review Added Successfully'); 
                    }
                });
                Swal.fire({
                    onAfterClose: function() {
                        window.location.href = '/redirect-url'; 
                    }
                });
            },
            error: function() {
                console.error('Error publishing review');
            }
        });
    }


let currentModalSlide = 0;

function openModal(clickedImage) {
    const modal = document.getElementById('myModal');
    const modalImage = document.getElementById('modalImage');

    currentModalSlide = clickedImage.dataset.index;

    modal.style.display = 'flex';
    modalImage.src = clickedImage.dataset.image;
    modalImage.alt = clickedImage.dataset.alt;
    showCurrentModalSlide();
}

function changeModalSlide(n) {
    currentModalSlide = (parseInt(currentModalSlide) + n + document.querySelectorAll('.slider-image').length) 
    % document.querySelectorAll('.slider-image').length;
    showCurrentModalSlide();
}

function showCurrentModalSlide() {
    const modalImage = document.getElementById('modalImage');
    modalImage.src = document.querySelector('.slider-images .slider-image[data-index="' + currentModalSlide + '"]').dataset.image;
    modalImage.alt = document.querySelector('.slider-images .slider-image[data-index="' + currentModalSlide + '"]').dataset.alt;
}

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('myModal');
    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});

function closeModal() {
    const modal = document.getElementById('myModal');
    modal.style.display = 'none';
}


$('#businessCategory').on('change', function () {
    var selectedCategoryId = $(this).val();
    var directoryViewRoute = "{{ route('directoryView', ['id' => '__ID__']) }}";

    $.ajax({
        url: "{{ route('getBusinessListings')}}",
        type: 'GET',
        data: { category: selectedCategoryId },
        dataType: 'json',
        success: function (data) {
            var businessContainer = $('#business-container');
            businessContainer.empty();

            $.each(data.businessListings, function (index, business) {
                var businessElement = $(
                    '<div class="directory-product-list-item">' +
                    '<div class="directory-product-list-item-lt">' +
                    '<a href="' + directoryViewRoute.replace('__ID__', btoa(business.id)) + '">' +
                    '<img src="{{ url("/storage/media/") }}/' + business.cover_image + '" alt="kebabvillage">' +
                    '</a>' +
                    '</div>' +
                    '<div class="directory-product-list-item-rt">' +
                    '<div class="rst-rating"><p><i class="fa-solid fa-layer-group"></i>' + business.business_category.name + '</p><div class="rating-star"><div class="review-stars">' +
                    '<span class="fa-solid fa-star star1"></span>' +
                    '<span class="fa-solid fa-star star2"></span>' +
                    '<span class="fa-solid fa-star star3"></span>' +
                    '<span class="fa-solid fa-star star4"></span>' +
                    '<span class="fa-solid fa-star star5"></span>' +
                    '</div> <i class="fa-solid fa-heart"></i></div></div>' +
                    '<h3><a href="' + directoryViewRoute.replace('__ID__', btoa(business.id)) + '">' + business.name + '</a></h3>' +
                    '<div class="address-location">' +
                    '<div class="add-loc-lt">' +
                    '<img src="{{\App\Helpers\ImageHelper::imageUrl("Pin.svg") }}" alt="Pin">' +
                    '<p>' + business.address + ' <br>Keywords: ' + business.keywords + '</p>' +
                    '</div>' +
                    '<div class="add-loc-rt">' +
                    '<img src="{{\App\Helpers\ImageHelper::imageUrl("location-marks.svg") }}" alt="Location">' +
                    '<p>1km</p>' +
                    '</div>' +
                    '</div>' +
                    '<div class="connect-details">' +
                    '<ul>' +
                    '<li><a href="#"><img src="{{\App\Helpers\ImageHelper::imageUrl("tele.svg") }}">Call us</a></li>' +
                    '<li><a href="#"><img src="{{\App\Helpers\ImageHelper::imageUrl("mail.svg") }}">message</a></li>' +
                    '<li><a href="' + business.website + '"><img src="{{\App\Helpers\ImageHelper::imageUrl("www.svg") }}">Website</a></li>' +
                    '<li><a href="#"><img src="{{\App\Helpers\ImageHelper::imageUrl("location-marks.svg") }}">Directions</a></li>' +
                    '<li><a href="{{ \App\Helpers\ShareHelper::generateWhatsAppShareComponent("Your WhatsApp share text comes here") }}"><img src="{{\App\Helpers\ImageHelper::imageUrl("Whatsapp.svg") }}">whatsapp</a></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );

                businessContainer.append(businessElement);
            });
        },
        error: function (error) {
            console.error('Error fetching business listings:', error);
        }
    });
});

</script>

