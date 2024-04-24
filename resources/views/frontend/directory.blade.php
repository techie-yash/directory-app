@extends('layouts.frontend')
@section('content')
<section class="restaurant-directory">
    <div class="container">
        <div class="restaurant-directory-cont">
            <div class="restaurant-directory-sidebar">
                <div class="map">
                    <img src="{{\App\Helpers\ImageHelper::imageUrl('map.png') }}" alt="Map">    
                </div>
                <div class="category-bar">
                    <input type="text" placeholder="What are you looking for?">   
                    <input type="text" placeholder="Fitness">   
                    <input type="text" placeholder="Filter By Region">   
                    <input type="text" placeholder="Location">  
                    <input type="text" placeholder="Price Range">   
                </div>
                <div class="filter-by-search">
                    <h4>Filter By Search</h4>
                    <input type="checkbox">
                    <label for="accepts for car">Accepts For Car</label><br>
                    <input type="checkbox">
                    <label for="Accessories">Accessories</label><br>
                    <input type="checkbox">
                    <label for="vehicle3">Alarm System</label><br> 
                    <input type="checkbox">
                    <label for="vehicle3">Car Parking</label><br> 
                    <input type="checkbox">
                    <label for="vehicle3">Elevetor</label><br> 
                    <input type="checkbox">
                    <label for="accepts for car">Accepts For Car</label><br>
                    <input type="checkbox">
                    <label for="Accessories">Accessories</label><br>
                    <input type="checkbox">
                    <label for="vehicle3">Alarm System</label><br> 
                    <input type="checkbox">
                    <label for="vehicle3">Car Parking</label><br> 
                    <input type="checkbox">
                    <label for="vehicle3">Elevetor</label><br> 
                    <input type="checkbox">
                    <label for="vehicle3">Alarm System</label><br> 
                    <input type="checkbox">
                    <label for="vehicle3">Car Parking</label><br> 
                    <input type="checkbox">
                    <label for="vehicle3">Elevetor</label><br> 
                    <a href="#" class="search-btn">Search</a>
                </div>
            </div>
            <div class="restaurant-directory-cont-rt">
                <div class="directory-breadcrumb">
                    <p><a href="{{ route('webpage')}}">HOME</a></p>
                    <p><img src="{{\App\Helpers\ImageHelper::imageUrl('right-arrow.svg') }}" alt="Arrow"></p>
                    <p>{{$name}}</p>
                    <h3>Top 10 Best Restaurants Near Jeddah, KSA</h3>
                    <h4>Sponsored Results</h4>
                </div>
                <div class="directory-filter-bar">
                    <div class="directory-filter-bar-lt">
                        <p>Showing 1-6 of 29 results</p>
                    </div>
                    <div class="directory-filter-bar-rt">
                        <select name="businessCategory" id="businessCategory">
                            <option value="beauty">Recently added (latest) </option>
                            @foreach($businessCategories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                        <div class="icons-hdr-bars">
                        <i class="fa-solid fa-list-ul"></i>
                            <i class="fa-solid fa-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="directory-product-list" id="business-container">
                    @foreach($business as $list)
                    <div class="directory-product-list-item">
                        <div class="directory-product-list-item-lt">
                        <a href="{{ route('directoryView', ['id' => base64_encode($list['id'])])}}">
                            <img src="{{ url('/storage/media/' . $list['cover_image']) }}" alt="kebabvillage">
                        </a>
                        </div>
                        <div class="directory-product-list-item-rt">
                        <div class="rst-rating"><p><a href="#"><i class="fa-solid fa-layer-group"></i>{{$list['business_category']['name']}}</a></p><div class="rating-star"><div class="review-stars">
                            <span class="fa-solid fa-star star1"></span>
                            <span class="fa-solid fa-star star2"></span>
                            <span class="fa-solid fa-star star3"></span>
                            <span class="fa-solid fa-star star4"></span>
                            <span class="fa-solid fa-star star5"></span>
                            </div> <i class="fa-solid fa-heart"></i></div></div> 
                            <h3><a href="{{ route('directoryView', ['id' => base64_encode($list['id'])])}}">{{$list['name']}}</a></h3>
                            <div class="address-location">
                                <div class="add-loc-lt">
                                    <a href="#">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p>{{$list['address']}} <br>Keywords: {{$list['keywords']}}</p>
                                    </a>
                                </div>
                                <div class="add-loc-rt">
                                    <a href="">
                                    <i class="fa-solid fa-route"></i>
                                    <p>1km</p>
                                    </a>
                                </div>
                            </div>
                            <div class="connect-details">
                                <ul>
                                    <li><a href="#"><i class="fa-solid fa-phone"></i>Call us</a></li>
                                    <li><a href="#"><i class="fa-solid fa-envelope"></i>message</a></li>
                                    <li><a href="{{ $list['website'] }}"><i class="fa-solid fa-globe"></i>Website</a></li>
                                    <li><a href="#"><i class="fa-solid fa-route"></i>Directions</a></li>
                                    <li><a href="{{ \App\Helpers\ShareHelper::generateWhatsAppShareComponent('Your WhatsApp share text comes here') }}"><i class="fa-brands fa-whatsapp"></i>whatsapp</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="directory-product-list-item mid-content">
                        <h2>ADV</h2>
                        <p>Contact us Now</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="find-business">
    <div class="container">
        <div class="find-business-cont">
            <div class="find-business-cont-lt">
                <img src="{{\App\Helpers\ImageHelper::imageUrl('hut.svg') }}" alt="hut">
                <div class="find-business-cont-lt-sub">
                    <h3>Can't find the business?</h3>
                    <p>Adding a business to alamoody is always free.</p>
                </div>
            </div>
            <div class="find-business-cont-rt"><a href="#">Add Business</a></div>
        </div>
    </div>
</section>
<section class="trending-companies">
    <div class="container">
        <div class="trending-companies-cont">
            <h3 class="direct-sitemidHd">EXPLORE TOP OFFERS</h3>
            <h2 class="direct-sitecommHd">EXPLORE TOP OFFERS</h2>
        </div>
        <div class="trending-comp-slider slick-initialized slick-slider">
            <div class="slick-list draggable" tabindex="0">
                <div class="slick-track" style="opacity: 1; width: 1890px; transform: translate3d(0px, 0px, 0px);">
                @foreach($topOffers as $offers)
                    <div class="trending-comp-inner-slider slick-slide slick-active" data-slick-index="0" style="width: 315px;">
                        <div class="trending-comp-slide">
                            <div class="trending-comp-slide-img">
                                <img src="{{ url('/storage/profile_images/' . $offers->coupon_image) }}" alt="Visa">   
                                <p><a href="">FEATURED</a></p>
                            </div>
                            <div class="trend-slide-cont">
                                <div class="trend-inner-slide-cont">
                                    <p><a href="#"><img src="{{\App\Helpers\ImageHelper::imageUrl('Stack-grey.png') }}" alt="Stack">Restaurant</a></p>
                                    <h4 class="heading"><a href="#"><i class="fa-solid fa-tag"></i>{{ $offers->title }}</a></h4>
                                    <p class="description">{{ $offers->description }}</p>
                                    <div class="loaction-des">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                                            <g clip-path="url(#clip0_189_5310)">
                                                <path d="M15.9025 4.23918V5.9328C15.9025 7.03854 15.2026 7.73838 14.0968 7.73838H11.7031V2.8465C11.7031 2.06968 12.34 1.43982 13.1169 1.43982C13.8798 1.44682 14.5797 1.75475 15.0837 2.25863C15.5876 2.76952 15.9025 3.46936 15.9025 4.23918Z" stroke="#DD3E4A" stroke-width="1.04981" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M1.91016 4.93902V14.7368C1.91016 15.3177 2.56806 15.6466 3.03 15.2967L4.22683 14.4009C4.50679 14.1909 4.89874 14.2189 5.1507 14.4709L6.31254 15.6396C6.5855 15.9125 7.03344 15.9125 7.3064 15.6396L8.48224 14.4639C8.7272 14.2189 9.11915 14.1909 9.39211 14.4009L10.5889 15.2967C11.0509 15.6396 11.7088 15.3107 11.7088 14.7368V2.8395C11.7088 2.06968 12.3387 1.43982 13.1086 1.43982H5.40967H4.70977C2.61006 1.43982 1.91016 2.69253 1.91016 4.23918V4.93902Z" stroke="#DD3E4A" stroke-width="1.04981" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M4.89453 9.64887L8.71598 5.82776" stroke="#DD3E4A" stroke-width="1.04981" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M8.85156 9.48792H8.86116" stroke="#DD3E4A" stroke-width="1.39974" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M4.84375 5.98877H4.85333" stroke="#DD3E4A" stroke-width="1.39974" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_189_5310">
                                                    <rect width="16.7977" height="16.7962" fill="white" transform="translate(0.507812 0.0401611)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>                                            
                                        <p>Coupon code: {{$offers->coupon}}</p>
                                    </div>
                                    <div class="phone-des">
                                    <i class="fa-regular fa-clock"></i>
                                        <p>Valid to {{ \Carbon\Carbon::parse($offers->end_date)->format('m/d/Y') }}</p>
                                    </div>
                                </div>
                                <div class="time-like">
                                    <div class="time-des">
                                    <p>Start Date:{{ \Carbon\Carbon::parse($offers->start_date)->format('m/d/Y') }}</p>
                                    </div>
                                    @if(Auth::guard('User')->user())
                                    <span class="heart "><i class="fa-solid fa-heart"></i></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                 @endforeach
                </div>
            </div>
            <button type="button" data-role="none" class="slick-prev slick-disabled" >Previous</button><button type="button" data-role="none" class="slick-next" >Next</button>
            <ul class="slick-dots" >
                <li class="slick-active"><button type="button" data-role="none">1</button></li>
                <li><button type="button" data-role="none">2</button></li>
            </ul>
        </div>
    </div>
</section>
@endsection