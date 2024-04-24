@extends('layouts.frontend')
@section('content')
<div class="comm-banner">
    <div class="slider-images">
        @foreach($uiForms->imageGallery as $index => $image)
            <img class="slider-image" src="{{ url('/storage/media/' . $image->image) }}" alt="{{ $image->alt }}" 
                 data-image="{{ url('/storage/media/' . $image->image) }}" 
                 data-alt="{{ $image->alt }}" 
                 data-index="{{ $index }}" 
                 onclick="openModal(this)">
        @endforeach
    </div>
</div>
<div class="modal" id="myModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <span class="prev" onclick="changeModalSlide(-1)">&#10094;</span>
        <img class="modal-image" id="modalImage" src="" alt="enlarged image">
        <span class="next" onclick="changeModalSlide(1)">&#10095;</span>
    </div>
</div>
<section class="kebab-restaurant">
    <div class="container">
        <div class="kebab-restaurant-cont">
            <div class="kebab-restaurant-lt">
                <img src="{{ url('/storage/media/' . $uiForms->cover_image) }}" alt="logo">
                <div class="village-member">
                    <img src="{{ \App\Helpers\ImageHelper::imageUrl('member-star.svg') }}" alt="star">
                    <p>Member</p>
                </div>
            </div>
            <div class="kebab-restaurant-mid">
                <ul class="kebab-rest-egy">
                    <li class="active"><a href="#">{{$uiForms->businessCategory->name}}</a></li>
                    <!-- <li><a href="#">Egyptian</a></li> -->
                </ul>
                <div class="kebab-heading">
                    <h3>{{$uiForms->name}}</h3>
                    <p><img src="{{ \App\Helpers\ImageHelper::imageUrl('check-green.png') }}" alt="check">Open Now</p>
                </div>
                <ul class="kebab-heading-loc">
                    <li><a href="#"><img src="{{ \App\Helpers\ImageHelper::imageUrl('check-green.png') }}" alt="pin">{{$uiForms->address}}</a></li>
                    <li><a href="#"><img src="{{ \App\Helpers\ImageHelper::imageUrl('check-green.png') }}" alt="eye">Views:{{$uiForms->views}}</a></li>
                </ul>
                <div class="reviews-kebab">
                    <img src="{{\App\Helpers\ImageHelper::imageUrl('yellow-review.svg') }}">
                    <p>Reviews</p>
                </div>
                <ul class="social-details">
                    <li><a href="#"><img src="{{\App\Helpers\ImageHelper::imageUrl('red-tele.svg') }}">{{$uiForms->phone_no}}</a></li>
                    <li><a href="#"><img src="{{\App\Helpers\ImageHelper::imageUrl('red-message.svg') }}">message</a></li>
                    <li><a href="{{$uiForms->website}}"><img src="{{\App\Helpers\ImageHelper::imageUrl('red-www.svg') }}">Website</a></li>
                    <li><a href="#" onclick="toggleMap(); return false;"><img src="{{\App\Helpers\ImageHelper::imageUrl('directions-red.svg') }}">Directions</a></li>
                </ul>
            </div>
            <div class="kebab-restaurant-rt">
                <ul>
                    <li><a href="#"><img src="{{\App\Helpers\ImageHelper::imageUrl('Whatsapp.svg') }}" alt="Whatsapp"></a></li>
                    <li><a href="#"><img src="{{\App\Helpers\ImageHelper::imageUrl('red-heart.svg') }}" alt="Like"></a></li>
                    @php
                    use App\Helpers\ShareHelper;
                    @endphp
                    @php
                        $shareData = ShareHelper::generateShareOptionsHtml('Your share text comes here');
                    @endphp
                    {!! $shareData['html'] !!}
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div id="map"></div>
</div>
<section class="restaurant-nav-list lower-section">
    <div class="container">
        <ul>
            <li>
                <a href="{{ route('directoryView', ['id' => base64_encode($uiForms->id)])}}">
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.20312 14.0001V19.6001C4.20312 22.2399 4.20312 23.5598 5.02323 24.38C5.84332 25.2001 7.16326 25.2001 9.80313 25.2001H23.8031C26.443 25.2001 27.7629 25.2001 28.583 24.38C29.4031 23.5598 29.4031 22.2399 29.4031 19.6001V12.6001C29.4031 8.64027 29.4031 6.66038 28.1729 5.43023C26.9428 4.20007 24.9629 4.20007 21.0031 4.20007H12.6031C8.64332 4.20007 6.66343 4.20007 5.43328 5.43023C4.74743 6.11607 4.44397 7.03495 4.30969 8.40007" stroke="black" stroke-width="2.1" stroke-linecap="round"/>
                        <path d="M30.8008 29.4001H22.4008M2.80078 29.4001H16.8008" stroke="black" stroke-width="2.1" stroke-linecap="round"/>
                        <path d="M21.0016 21.0001H12.6016" stroke="black" stroke-width="2.1" stroke-linecap="round"/>
                    </svg>
                    <p>About</p>
                </a>
            </li>
            <li>
                <a href="{{ route('uiOffers', ['id' => base64_encode($uiForms->id)])}}">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.30594 21.5158C4.24524 19.4552 3.21488 18.4248 2.83149 17.088C2.44809 15.7512 2.77575 14.3313 3.43105 11.4916L3.80896 9.85406C4.36027 7.46504 4.63593 6.27052 5.45389 5.45255C6.27186 4.63459 7.46639 4.35892 9.8554 3.80762L11.493 3.42971C14.3326 2.7744 15.7525 2.44675 17.0893 2.83015C18.4261 3.21354 19.4565 4.2439 21.5172 6.3046L23.9566 8.74412C27.542 12.3294 29.3346 14.1221 29.3346 16.3497C29.3346 18.5773 27.542 20.37 23.9566 23.9553C20.3713 27.5406 18.5786 29.3333 16.351 29.3333C14.1234 29.3333 12.3308 27.5406 8.74546 23.9553L6.30594 21.5158Z" stroke="#1C274C" stroke-width="2"/>
                        <path d="M13.36 13.7241C14.4014 12.6827 14.4014 10.9943 13.36 9.95288C12.3186 8.91149 10.6301 8.91149 9.58874 9.95288C8.54734 10.9943 8.54734 12.6827 9.58874 13.7241C10.6301 14.7655 12.3186 14.7655 13.36 13.7241Z" stroke="#1C274C" stroke-width="2"/>
                        <path d="M15.3906 24.6667L24.6961 15.3611" stroke="#1C274C" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <p>Offers</p>
                </a>
            </li>
            <li>
                <a href="{{ route('uiMenu', ['id' => base64_encode($uiForms->id)])}}">
                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.67816 14.2664C12.3503 14.2664 14.5165 12.1002 14.5165 9.42799C14.5165 6.75582 12.3503 4.5896 9.67816 4.5896C7.00603 4.5896 4.83984 6.75582 4.83984 9.42799C4.83984 12.1002 7.00603 14.2664 9.67816 14.2664Z" stroke="black" stroke-width="2.07358" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M24.8852 14.2664C27.5573 14.2664 29.7235 12.1002 29.7235 9.42799C29.7235 6.75582 27.5573 4.5896 24.8852 4.5896C22.2131 4.5896 20.0469 6.75582 20.0469 9.42799C20.0469 12.1002 22.2131 14.2664 24.8852 14.2664Z" stroke="black" stroke-width="2.07358" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.67816 29.4728C12.3503 29.4728 14.5165 27.3066 14.5165 24.6344C14.5165 21.9622 12.3503 19.796 9.67816 19.796C7.00603 19.796 4.83984 21.9622 4.83984 24.6344C4.83984 27.3066 7.00603 29.4728 9.67816 29.4728Z" stroke="black" stroke-width="2.07358" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M24.8852 29.4728C27.5573 29.4728 29.7235 27.3066 29.7235 24.6344C29.7235 21.9622 27.5573 19.796 24.8852 19.796C22.2131 19.796 20.0469 21.9622 20.0469 24.6344C20.0469 27.3066 22.2131 29.4728 24.8852 29.4728Z" stroke="black" stroke-width="2.07358" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p>menu</p>
                </a>
            </li>
            <li>
                <a href="{{ route('uiMagazine', ['id' => base64_encode($uiForms->id)])}}">
                    <svg width="26" height="32" viewBox="0 0 26 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24.7665 3.38615H22.441V1.05873C22.441 0.747479 22.3041 0.452177 22.0667 0.250885C21.8293 0.0497352 21.5151 -0.0367947 21.2085 0.0144457L0.88474 3.40054C0.374193 3.48566 0 3.9272 0 4.44483V30.9413C0 31.526 0.473988 32 1.05864 32H24.7664C25.3512 32 25.825 31.526 25.825 30.9413V4.44483C25.8251 3.86015 25.3512 3.38615 24.7665 3.38615ZM2.11742 5.34175L20.3237 2.3084V26.66L2.11742 29.6918V5.34175ZM23.7079 29.8826H13.8615L21.5563 28.6012C22.0668 28.5162 22.4412 28.0745 22.4412 27.5569V5.50352H23.708L23.7079 29.8826Z" fill="black"/>
                        <path d="M16.5291 7.0584L5.59208 8.7523C5.01434 8.84179 4.61855 9.38271 4.7079 9.96047C4.78892 10.4835 5.23962 10.8572 5.75271 10.8572C5.80649 10.8572 5.86125 10.8531 5.91602 10.8447L16.8529 9.15078C17.4308 9.06129 17.8266 8.52037 17.7372 7.94247C17.6477 7.36485 17.107 6.96891 16.5291 7.0584Z" fill="black"/>
                    </svg>
                    <p>Magazines</p>
                </a>
            </li>
            <li>
                <a href="{{ route('uiEvents', ['id' => base64_encode($uiForms->id)])}}">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.3801 20.9065C26.2049 20.9065 26.8734 20.2379 26.8734 19.4131C26.8734 18.5884 26.2049 17.9198 25.3801 17.9198C24.5553 17.9198 23.8867 18.5884 23.8867 19.4131C23.8867 20.2379 24.5553 20.9065 25.3801 20.9065Z" fill="#1C274C"/>
                        <path d="M25.3801 26.8799C26.2049 26.8799 26.8734 26.2113 26.8734 25.3865C26.8734 24.5618 26.2049 23.8932 25.3801 23.8932C24.5553 23.8932 23.8867 24.5618 23.8867 25.3865C23.8867 26.2113 24.5553 26.8799 25.3801 26.8799Z" fill="#1C274C"/>
                        <path d="M19.4086 19.4131C19.4086 20.2379 18.74 20.9065 17.9152 20.9065C17.0905 20.9065 16.4219 20.2379 16.4219 19.4131C16.4219 18.5884 17.0905 17.9198 17.9152 17.9198C18.74 17.9198 19.4086 18.5884 19.4086 19.4131Z" fill="#1C274C"/>
                        <path d="M19.4086 25.3865C19.4086 26.2113 18.74 26.8799 17.9152 26.8799C17.0905 26.8799 16.4219 26.2113 16.4219 25.3865C16.4219 24.5618 17.0905 23.8932 17.9152 23.8932C18.74 23.8932 19.4086 24.5618 19.4086 25.3865Z" fill="#1C274C"/>
                        <path d="M10.4465 20.9065C11.2713 20.9065 11.9398 20.2379 11.9398 19.4131C11.9398 18.5884 11.2713 17.9198 10.4465 17.9198C9.62173 17.9198 8.95312 18.5884 8.95312 19.4131C8.95312 20.2379 9.62173 20.9065 10.4465 20.9065Z" fill="#1C274C"/>
                        <path d="M10.4465 26.8799C11.2713 26.8799 11.9398 26.2113 11.9398 25.3865C11.9398 24.5618 11.2713 23.8932 10.4465 23.8932C9.62173 23.8932 8.95312 24.5618 8.95312 25.3865C8.95312 26.2113 9.62173 26.8799 10.4465 26.8799Z" fill="#1C274C"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4501 2.61316C11.0687 2.61316 11.5701 3.11461 11.5701 3.73316V4.87216C12.5587 4.85315 13.6479 4.85315 14.8457 4.85316H20.9878C22.1858 4.85315 23.2751 4.85315 24.2637 4.87216V3.73316C24.2637 3.11461 24.7651 2.61316 25.3837 2.61316C26.0022 2.61316 26.5037 3.11461 26.5037 3.73316V4.96828C26.8918 4.99788 27.2595 5.03508 27.6073 5.08184C29.3581 5.31723 30.7753 5.8132 31.8929 6.93075C33.0104 8.04832 33.5064 9.4654 33.7419 11.2162C33.9705 12.9174 33.9705 15.0912 33.9705 17.8355V20.9907C33.9705 23.735 33.9705 25.9089 33.7419 27.6101C33.5064 29.3609 33.0104 30.7781 31.8929 31.8957C30.7753 33.0131 29.3581 33.5091 27.6073 33.7446C25.9061 33.9732 23.7323 33.9732 20.988 33.9732H14.8459C12.1015 33.9732 9.92769 33.9732 8.22646 33.7446C6.47561 33.5091 5.05849 33.0131 3.9409 31.8957C2.82333 30.7781 2.32736 29.3609 2.09197 27.6101C1.86324 25.9089 1.86325 23.7352 1.86328 20.9907V17.8356C1.86325 15.0912 1.86324 12.9175 2.09197 11.2162C2.32736 9.4654 2.82333 8.04832 3.9409 6.93075C5.05849 5.8132 6.47561 5.31723 8.22646 5.08184C8.57429 5.03508 8.9419 4.99788 9.33008 4.96828V3.73316C9.33008 3.11461 9.83153 2.61316 10.4501 2.61316ZM8.52493 7.30187C7.02248 7.50386 6.15685 7.88268 5.52485 8.51467C4.89285 9.14666 4.51402 10.0123 4.31203 11.5147C4.27782 11.7691 4.24922 12.037 4.2253 12.3198H31.6085C31.5846 12.037 31.5559 11.7692 31.5217 11.5147C31.3198 10.0123 30.9409 9.14666 30.3089 8.51467C29.677 7.88268 28.8113 7.50386 27.3089 7.30187C25.7742 7.09554 23.7512 7.09316 20.9036 7.09316H14.9302C12.0826 7.09316 10.0596 7.09554 8.52493 7.30187ZM4.10332 17.9198C4.10332 16.6445 4.1038 15.5345 4.12287 14.5598H31.7109C31.73 15.5345 31.7305 16.6445 31.7305 17.9198V20.9065C31.7305 23.754 31.7281 25.777 31.5217 27.3117C31.3198 28.814 30.9409 29.6797 30.3089 30.3117C29.677 30.9437 28.8113 31.3225 27.3089 31.5244C25.7742 31.7308 23.7512 31.7332 20.9036 31.7332H14.9302C12.0826 31.7332 10.0596 31.7308 8.52493 31.5244C7.02248 31.3225 6.15685 30.9437 5.52485 30.3117C4.89285 29.6797 4.51402 28.814 4.31203 27.3117C4.1057 25.777 4.10332 23.754 4.10332 20.9065V17.9198Z" fill="#1C274C"/>
                    </svg>
                    <p>Events</p>
                </a>
            </li>
            <li>
                <a href="{{ route('uiForms', ['id' => base64_encode($uiForms->id)])}}">
                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_359_702)">
                            <path d="M3.28125 3.27698H14.7503V14.7458H3.28125V3.27698ZM18.0272 3.27698V14.7458H29.4963V3.27698H18.0272ZM9.01578 7.37297L11.4734 4.91538H6.55813L9.01578 7.37297ZM19.6656 13.1074V4.91538H27.8578V13.1074H19.6656ZM7.37734 9.01137L4.91969 6.55377V11.469L7.37734 9.01137ZM13.1119 6.55377L10.6542 9.01137L13.1119 11.469V6.55377ZM9.01578 10.6498L6.55813 13.1074H11.4734L9.01578 10.6498ZM14.7503 29.4914V18.0226H3.28125V29.4914H14.7503ZM29.4963 29.4914H18.0272V18.0226H29.4963V29.4914ZM13.1119 19.661V27.853H4.91969V19.661H13.1119ZM23.7617 22.1186L26.2194 19.661H21.3041L23.7617 22.1186ZM19.6656 26.2146L22.1233 23.757L19.6656 21.2994V26.2146ZM25.4002 23.757L27.8578 26.2146V21.2994L25.4002 23.757ZM23.7617 25.3954L21.3041 27.853H26.2194L23.7617 25.3954Z" fill="black"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_359_702">
                                <rect width="32.7687" height="32.768" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <p>Forms</p>
                </a>
            </li>
            <li>
                <a href="{{ route('uiProducts', ['id' => base64_encode($uiForms->id)])}}">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 3.66663H27.3333V1.66663H18V3.66663ZM28.3333 4.66663V9.99996H30.3333V4.66663H28.3333ZM27.3333 11H18V13H27.3333V11ZM17 9.99996V4.66663H15V9.99996H17ZM18 11C17.4477 11 17 10.5522 17 9.99996H15C15 11.6568 16.3432 13 18 13V11ZM28.3333 9.99996C28.3333 10.5522 27.8856 11 27.3333 11V13C28.9901 13 30.3333 11.6568 30.3333 9.99996H28.3333ZM27.3333 3.66663C27.8856 3.66663 28.3333 4.11435 28.3333 4.66663H30.3333C30.3333 3.00977 28.9901 1.66663 27.3333 1.66663V3.66663ZM18 1.66663C16.3432 1.66663 15 3.00977 15 4.66663H17C17 4.11435 17.4477 3.66663 18 3.66663V1.66663Z" fill="black"/>
                        <path d="M2.66797 17.6666C2.11569 17.6666 1.66797 18.1144 1.66797 18.6666C1.66797 19.2189 2.11569 19.6666 2.66797 19.6666V17.6666ZM29.3346 19.6666C29.8869 19.6666 30.3346 19.2189 30.3346 18.6666C30.3346 18.1144 29.8869 17.6666 29.3346 17.6666V19.6666ZM2.66797 19.6666H29.3346V17.6666H2.66797V19.6666Z" fill="black"/>
                        <path d="M2.66797 23C2.11569 23 1.66797 23.4477 1.66797 24C1.66797 24.5523 2.11569 25 2.66797 25V23ZM29.3346 25C29.8869 25 30.3346 24.5523 30.3346 24C30.3346 23.4477 29.8869 23 29.3346 23V25ZM2.66797 25H29.3346V23H2.66797V25Z" fill="black"/>
                        <path d="M2.66797 28.3334C2.11569 28.3334 1.66797 28.7811 1.66797 29.3334C1.66797 29.8856 2.11569 30.3334 2.66797 30.3334V28.3334ZM18.668 30.3334C19.2202 30.3334 19.668 29.8856 19.668 29.3334C19.668 28.7811 19.2202 28.3334 18.668 28.3334V30.3334ZM2.66797 30.3334H18.668V28.3334H2.66797V30.3334Z" fill="black"/>
                        <path d="M12.0013 8.33337C12.5536 8.33337 13.0013 7.88565 13.0013 7.33337C13.0013 6.78109 12.5536 6.33337 12.0013 6.33337V8.33337ZM2.66797 6.33337C2.11569 6.33337 1.66797 6.78109 1.66797 7.33337C1.66797 7.88565 2.11569 8.33337 2.66797 8.33337V6.33337ZM12.0013 6.33337H2.66797V8.33337H12.0013V6.33337Z" fill="black"/>
                        <path d="M8.75927 2.01586C8.39986 1.59652 7.76855 1.54796 7.34923 1.90739C6.9299 2.2668 6.88134 2.89811 7.24077 3.31743L8.75927 2.01586ZM12 7.33331L12.7593 7.9841C13.0803 7.60962 13.0803 7.057 12.7593 6.68252L12 7.33331ZM7.24077 11.3492C6.88134 11.7685 6.9299 12.3998 7.34923 12.7592C7.76855 13.1187 8.39986 13.0701 8.75927 12.6508L7.24077 11.3492ZM7.24077 3.31743L11.2408 7.9841L12.7593 6.68252L8.75927 2.01586L7.24077 3.31743ZM11.2408 6.68252L7.24077 11.3492L8.75927 12.6508L12.7593 7.9841L11.2408 6.68252Z" fill="black"/>
                    </svg>
                    <p>Products</p>
                </a>
            </li>
            <li>
                <a href="{{ route('uiBranches', ['id' => base64_encode($uiForms->id)])}}">
                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_359_681)">
                            <path d="M26.9147 0.615845H1.75958C1.12679 0.615845 0.617188 1.12545 0.617188 1.75825V26.9135C0.617188 27.5463 1.12679 28.0559 1.75958 28.0559H26.9147C27.5475 28.0559 28.0571 27.5463 28.0571 26.9135V1.75825C28.0571 1.12545 27.5419 0.615845 26.9147 0.615845ZM25.7667 5.49906C25.7667 6.60226 24.8707 7.49826 23.7675 7.49826C22.6643 7.49826 21.7683 6.60226 21.7683 5.49906V2.90065H25.7723V5.49906H25.7667ZM19.4723 5.49906C19.4723 6.60226 18.5763 7.49826 17.4731 7.49826C16.3699 7.49826 15.4739 6.60226 15.4739 5.49906V2.90065H19.4779V5.49906H19.4723ZM13.1835 5.49906C13.1835 6.60226 12.2875 7.49826 11.1843 7.49826C10.0811 7.49826 9.18515 6.60226 9.18515 5.49906V2.90065H13.1891V5.49906H13.1835ZM6.88916 5.49906C6.88916 6.60226 5.99316 7.49826 4.88997 7.49826C3.78677 7.49826 2.89078 6.60226 2.89078 5.49906V2.90065H6.89476V5.49906H6.88916ZM12.3099 25.7711V17.8919H16.3139V25.7711H12.3099ZM18.5987 25.7711V16.7495C18.5987 16.1167 18.0891 15.6071 17.4563 15.6071H11.1675C10.5347 15.6071 10.0251 16.1167 10.0251 16.7495V25.7711H2.87958V9.29027C3.47878 9.60947 4.15637 9.78867 4.87877 9.78867C6.12196 9.78867 7.24196 9.25667 8.02036 8.41106C8.80435 9.25667 9.92435 9.78867 11.1619 9.78867C12.4051 9.78867 13.5251 9.25667 14.3035 8.41106C15.0875 9.25667 16.2075 9.78867 17.4451 9.78867C18.6883 9.78867 19.8083 9.25667 20.5867 8.41106C21.3707 9.25667 22.4907 9.78867 23.7283 9.78867C24.4507 9.78867 25.1339 9.60947 25.7275 9.29027V25.7711H18.5987Z" fill="black"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_359_681">
                                <rect width="28.6719" height="28.6721" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <p>Branches</p>
                </a>
            </li>
            <li>
                <a href="{{ route('uiReview', ['id' => base64_encode($uiForms->id)])}}">
                    <svg width="52" height="21" viewBox="0 0 52 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M48.4606 0H3.38094C1.51373 0 0 1.51379 0 3.38084V16.9043C0 18.7715 1.51373 20.2852 3.38094 20.2852H48.4605C50.3277 20.2852 51.8414 18.7715 51.8414 16.9043V3.38084C51.8415 1.51379 50.3278 0 48.4606 0ZM14.9135 15.7774L10.9389 13.6879L6.96428 15.7774L7.72337 11.3519L4.50788 8.21756L8.95157 7.57189L10.9389 3.54527L12.9262 7.57189L17.3698 8.21756L14.1544 11.3519L14.9135 15.7774ZM29.8954 15.7774L25.9208 13.6879L21.9461 15.7774L22.7052 11.3519L19.4897 8.21756L23.9334 7.57189L25.9208 3.54527L27.908 7.57189L32.3517 8.21756L29.1362 11.3519L29.8954 15.7774ZM44.8771 15.7774L40.9024 13.6879L36.9279 15.7774L37.687 11.3519L34.4715 8.21756L38.9152 7.57189L40.9024 3.54527L42.8897 7.57189L47.3334 8.21756L44.1179 11.3519L44.8771 15.7774Z" fill="black"/>
                    </svg>
                    <p>Reviews</p>
                </a>
            </li>
            <li>
                <a href="{{ route('uiPost', ['id' => base64_encode($uiForms->id)])}}">
                    <svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9888 8.16016H24.1084C25.8335 8.1601 27.272 8.16006 28.414 8.31359C29.6193 8.47565 30.7076 8.83214 31.5819 9.70664C32.4565 10.5811 32.813 11.6694 32.975 12.8748C33.1286 14.0167 33.1284 15.4552 33.1284 17.1802V28.9C33.1284 30.6251 33.1286 32.0636 32.975 33.2056C32.813 34.4109 32.4565 35.4992 31.5819 36.3736C30.7076 37.2481 29.6193 37.6047 28.414 37.7667C27.272 37.9203 25.8335 37.9201 24.1084 37.9201H21.9888C20.2637 37.9201 18.8252 37.9203 17.6833 37.7667C16.4779 37.6047 15.3897 37.2481 14.5152 36.3736C13.6407 35.4992 13.2842 34.4109 13.1222 33.2056C12.9687 32.0636 12.9687 30.6251 12.9688 28.9V17.1803C12.9687 15.4552 12.9687 14.0167 13.1222 12.8748C13.2842 11.6694 13.6407 10.5811 14.5152 9.70664C15.3897 8.83214 16.4779 8.47565 17.6833 8.31359C18.8252 8.16006 20.2637 8.1601 21.9888 8.16016ZM18.067 11.1679C17.181 11.287 16.8019 11.4929 16.5516 11.7431C16.3014 11.9933 16.0956 12.3725 15.9765 13.2585C15.8518 14.1859 15.8487 15.4293 15.8487 17.2801V28.8001C15.8487 30.651 15.8518 31.8944 15.9765 32.8218C16.0956 33.7078 16.3014 34.087 16.5516 34.3372C16.8019 34.5874 17.181 34.7932 18.067 34.9125C18.9944 35.0371 20.2378 35.0401 22.0886 35.0401H24.0086C25.8594 35.0401 27.1028 35.0371 28.0302 34.9125C28.9162 34.7932 29.2954 34.5874 29.5456 34.3372C29.7958 34.087 30.0016 33.7078 30.1208 32.8218C30.2454 31.8944 30.2485 30.651 30.2485 28.8001V17.2801C30.2485 15.4293 30.2454 14.1859 30.1208 13.2585C30.0016 12.3725 29.7958 11.9933 29.5456 11.7431C29.2954 11.4929 28.9162 11.287 28.0302 11.1679C27.1028 11.0432 25.8594 11.0402 24.0086 11.0402H22.0886C20.2378 11.0402 18.9944 11.0432 18.067 11.1679Z" fill="#1C274C"/>
                        <path d="M41.2829 11.04C39.4272 11.04 37.9229 12.5443 37.9229 14.4V31.68C37.9229 33.5357 39.4272 35.04 41.2829 35.04H42.2429C43.0381 35.04 43.6828 35.6847 43.6828 36.48C43.6828 37.2753 43.0381 37.92 42.2429 37.92H41.2829C37.8367 37.92 35.043 35.1262 35.043 31.68V14.4C35.043 10.9538 37.8367 8.16003 41.2829 8.16003H42.2429C43.0381 8.16003 43.6828 8.80475 43.6828 9.60003C43.6828 10.3953 43.0381 11.04 42.2429 11.04H41.2829Z" fill="#1C274C"/>
                        <path d="M3.85013 8.16003C3.05486 8.16003 2.41016 8.80475 2.41016 9.60003C2.41016 10.3953 3.05486 11.04 3.85013 11.04H4.81012C6.66577 11.04 8.17007 12.5443 8.17007 14.4V31.68C8.17007 33.5357 6.66577 35.04 4.81012 35.04H3.85013C3.05486 35.04 2.41016 35.6847 2.41016 36.48C2.41016 37.2753 3.05486 37.92 3.85013 37.92H4.81012C8.25633 37.92 11.05 35.1262 11.05 31.68V14.4C11.05 10.9538 8.25633 8.16003 4.81012 8.16003H3.85013Z" fill="#1C274C"/>
                    </svg>
                    <p>Posts</p>
                </a>
            </li>
        </ul>
    </div>
</section>
<section class="forms-page">
    <div class="container">
        <div class="restaur-nav-inner-cont forms-page-cont">
            <div class="directory-product-list">
                <div class="directory-product-list-item">
                    <div class="directory-product-list-item-lt">
                        <img src="{{\App\Helpers\ImageHelper::imageUrl('form-page-img.png') }}" alt="kebabvillage">
                    </div>
                    <div class="directory-product-list-item-rt">
                        <h3>Form Title goes here</h3>
                        <h4>Form type</h4>
                        <p>Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.Reference site giving information on its origins, as well as a random generator.</p>
                        <a href="#" class="dwnld-btn">Contribute</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="forms-page form">
    <div class="container">
        <div class="restaur-nav-inner-cont forms-page-cont">
            <div class="directory-product-list">
                <div class="directory-product-list-item">
                    <div class="directory-product-list-item-lt">
                        <img src="{{\App\Helpers\ImageHelper::imageUrl('form-page-img.png') }}" alt="kebabvillage">
                    </div>
                    <div class="directory-product-list-item-rt">
                        <h3>Form Title goes here</h3>
                        <h4>Form type</h4>
                        <p>Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.Reference site giving information on its origins, as well as a random generator.</p>
                    </div>
                </div>
                <form action="#">
                    <div class="tile-bar">
                        <h4 class="title">Title</h4>
                        <div>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label>Mr.</label>
                        </div>
                        <div>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                            <label>Ms.</label>
                        </div>
                        <div>
                            <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                            <label>Mrs</label>
                        </div>
                    </div>
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
                            <label for="city">City</label>
                            <input type="text" name="city" id="city">
                        </div>
                        <div class="field">
                            <label for="phone">Phone number</label>
                            <input type="text" name="phone" id="phone">
                        </div>
                        <div class="field">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email">
                        </div>
                    </div>
                    <div class="field services-feedback">
                        <h4 class="title">How do you like our service?</h4>
                        <div>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label>I like it</label>
                        </div>
                        <div>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                            <label >I dont like it</label>
                        </div>
                        <div>
                            <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                            <label>Moderate</label>
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
</section>
<section class="newsletter">
    <div class="container">
        <div class="newsletter-cont">
            <div class="newsletter-cont-lt">
                <h3>Subscribe to our newsletter</h3>
                <p>Vestibulum consectetur placerat tellus. Sed faucibus<br>fermentum purus, at facilisis.</p>
            </div>
            <div class="newsletter-cont-rt">
                <div class="newsletter-cont-rt-form">
                    <img src="assets/webpage/images/Envelope.svg" alt="envelope">  
                    <input type="text" placeholder="Email address">   
                    <a href="#">Subscribe</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection