@extends('layouts.frontend')
@section('content')
        <section class="hero-banner">
            <div class="container">
                <p>Discover Great Places Around you!</p>
                <h1>Let’s Find An Amazing<br>Deals For you</h1>
            </div>
        </section>
        <section class="mid-search-bar">
            <div class="container">
            <div class="mid-detailing-search">
                <div class="mid-search-bar-cont">
                    <input type="text" class="search-input" placeholder="Search What are you looking for...">
                    <div class="select-location">
                        <img src="{{url('assets/webpage/images/location-pin.svg')}}" alt="location">
                        <select name="location" id="location">
                            <option value="N">Select Location:</option>
                        </select>
                    </div>
                    <div class="select-category">
                        <img src="{{url('assets/webpage/images/category.svg')}}" alt="category">
                        <select name="category" id="category">
                            <option value="beauty">Select Category:</option>
                            <option value="fitness">Fitness</option>
                            <option value="cars">Cars</option>
                        </select>
                    </div>
                    <button class="search-btn">Search</button>
                </div>
                <div class="categories-container">
                    <div class="top-searches">Top Search</div>
                    <div class="category"><img src="{{url('assets/webpage/images/beauty.png')}}" alt="Beauty">Beauty</div>
                    <div class="category"><img src="{{url('assets/webpage/images/fitness.png')}}" alt="Fitness">Fitness</div>
                    <div class="category"><img src="{{url('assets/webpage/images/cars.png')}}" alt="Cars">Cars</div>
                </div>
            </div>
        </section>
        <section class="holiday-places">
            <div class="container">
                <div class="holiday-places-list">
                    @foreach($businessCategory as $category)
                    <div class="holiday-place">
                        <a href="{{ route('uiDirectory', ['id' => base64_encode($category->id), 'slug' => $category->slug]) }}">
                            <img src="{{ url('assets/webpage/images/burger-fast-food.png') }}" alt="Restaurant Icon">
                            <h3>{{$category->name}}</h3>
                        </a>
                    </div>                        
                    @endforeach
                </div>
            </div>
        </section>
        <section class="trending-companies">
            <div class="container">
                <div class="trending-companies-cont">
                    <h3 class="direct-sitemidHd">TRENDING COMPANIES IN KSA</h3>
                    <h2 class="direct-sitecommHd">TRENDING COMPANIES</h2>
                </div>
                <div class="trending-comp-slider">
                    @foreach($trendingCompanies as $userId =>  $businessess)
                    @foreach($businessess->take(1) as $business)
                    <div class="trending-comp-inner-slider">
                        <div class="trending-comp-slide">
                            <div class="trending-comp-slide-img">
                                <img src="{{ url('/storage/media/' . $business->cover_image) }}" alt="Visa">   
                                <p><a href="#">FEATURED</a></p>
                            </div>
                            <div class="trend-slide-cont">
                                <div class="trend-inner-slide-cont">
                                    <p><a href="#"><i class="fa-solid fa-layer-group"></i>{{$business->businessCategory->name}}</a></p>
                                    <h4 class="heading">{{$business->name}}</h4>
                                    <p class="description">{{$business->slogan}}.</p>
                                    <div class="loaction-des">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p><a href="#">{{$business->address}},{{$business->country}}</a></p>
                                    </div>
                                    <div class="phone-des">
                                        <i class="fa-solid fa-phone"></i>
                                        <p><a href="#">{{$business->phone_no}}</a></p>
                                    </div>
                                </div>
                                <div class="time-like">
                                    <div class="time-des">
                                        <i class="fa-regular fa-clock"></i>
                                        <p>10:00 am - 05:00 pm</p>
                                    </div>
                                    @if(Auth::guard('User')->user())
                                    <span class="heart"><i class="fa-solid fa-heart"></i> </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </section>
        <section class="explore-products">
            <div class="container">
            <div class="explore-products-cont">
                <h3 class="direct-sitemidHd">OUR LATEST LISTING</h3>
                <h2 class="direct-sitecommHd">EXPLORE PRODUCTS</h2>
            </div>
            <div class="explore-products-boxes">
                @foreach($products as $product)
                <div class="trending-comp-slide">
                    <div class="trending-comp-slide-img">
                        <img src="{{ url('/storage/media/' . $product->media) }}" alt="concrete">   
                        <p><a>FEATURED</a></p>
                        <p class="dark-bg"><a>Coffee Shop</a></p>
                        <div class="explore-products-restaurants">
                            <img src="{{ $product->business && $product->business->business_logo ? url('/storage/media/' . $product->business->business_logo) : url('assets/webpage/images/apple.png') }}" alt="logo">  
                            <div class="restaurant-cont-details">
                                <h3>CONCRTE</h3>
                                <p>{{ $product->business && $product->business->name ? $product->business->name : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="trend-slide-cont">
                        <div class="trend-inner-slide-cont">
                            <a href="#">
                                <p><img src="{{url('assets/webpage/images/product-top.svg')}}" alt="Stack">{{$product->title}}</p>
                            </a>
                            <p class="description">{{$product->description}}.</p>
                        </div>
                        <div class="time-like">
                            <div class="time-des">
                                <p>Valid till {{ \Carbon\Carbon::parse($product->until_date)->format('m/d/Y') }}</p>
                            </div>
                            @if(Auth::guard('User')->user())
                            <span class="heart"><i class="fa-solid fa-heart"></i></span>
                            @endif
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </section>
        <section class="explore-offers">
            <div class="container">
                <div class="explore-offers-cont">
                    <h3 class="direct-sitemidHd">OUR LATEST LISTING</h3>
                    <h2 class="direct-sitecommHd">EXPLORE TOP OFFERS</h2>
                    <div class="explore-offers-boxes">
                        @foreach($offers as $offer)
                        <div class="trending-comp-inner-slider">
                            <div class="trending-comp-slide">
                                <div class="trending-comp-slide-img">
                                    <img src="{{ url('/storage/profile_images/' . $offer->coupon_image) }}" alt="Visa">   
                                    <p><a>FEATURED</a></p>
                                    <div class="explore-products-restaurants">
                                    <img src="{{ $offer->business && $offer->business->business_logo ? url('/storage/media/' . $offer->business->business_logo) : url('assets/webpage/images/apple.png') }}" alt="logo">  
                                        <div class="restaurant-cont-details">
                                            <h3>FINDI</h3>
                                            <p>{{ $offer->business && $offer->business->name ? $offer->business->name : '' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="trend-slide-cont">
                                    <div class="trend-inner-slide-cont">
                                        <p><img src="{{url('assets/webpage/images/Stack-grey.png')}}" alt="Stack">Entertainment</p>
                                        <a href="#">
                                            <h4 class="heading"><i class="fa-solid fa-tag"></i>{{ $offer->title }}</h4>
                                        </a>
                                        <p class="description">{{ $offer->description }}</p>
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
                                            <p>Coupon code: {{ $offer->coupon}}</p>
                                        </div>
                                        <div class="phone-des">
                                        <i class="fa-regular fa-clock"></i>
                                            <p>Valid to {{ \Carbon\Carbon::parse($offer->end_date)->format('m/d/Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="time-like">
                                        <div class="time-des">
                                            <p>Start Date:{{ \Carbon\Carbon::parse($offer->start_date)->format('m/d/Y') }}</p>
                                        </div>
                                        @if(Auth::guard('User')->user())
                                        <span class="heart"><i class="fa-solid fa-heart"></i></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="special-offer">
            <div class="container">
                <div class="special-offer-cont">
                    <div class="special-offer-cont-lt">
                        <p>Sign up to get</p>
                        <h2>Special Offers</h2>
                    </div>
                    <div class="special-offer-cont-rt"><a href="{{ route('contacUs')}}">Contact Us</a></div>
                </div>
            </div>
        </section>
        <section class="discover-business">
            <div class="container">
                <div class="discover-business-cont">
                    <div class="discover-business-cont-lt">
                        <h4>What Do you want</h4>
                        <h3>Discover Great Local Businesses in KSA</h3>
                    </div>
                    <div class="discover-business-cont-rt">
                        <div class="directory-count">
                            <img src="{{url('assets/webpage/images/directory.png')}}" alt="directory">
                            <h3>1240</h3>
                            <p>Businesses Listing are on our directory</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="popular-locations">
            <div class="container">
                <h3 class="direct-sitemidHd">EXPLORE TOP LOCATIONS</h3>
                <h2 class="direct-sitecommHd">POPULAR LOCATIONS</h2>
                <div class="popular-locations-cont">
                    @foreach($topCitys as $city)
                    <div class="popular-locations-boxes">
                        <a href="{{ route('viewLocations', ['id' => base64_encode($city->id), 'slug' => $city->slug]) }}">
                            <img src="{{ url('/storage/profile_images/' . $city['image']) }}" alt="image"> 
                        </a>
                        <h4>{{ $city->name}}</h4>
                        <p>{{ $city->location_lists_count }} Directory</p>
                    </div>
                     @endforeach
                </div>
            </div>
        </section>
        <section class="trending-companies explore-events">
            <div class="container">
                <div class="trending-companies-cont">
                    <h3 class="direct-sitemidHd">EXPLORE TOP EVENTS</h3>
                    <h2 class="direct-sitecommHd">EXPLORE TOP EVENTS</h2>
                </div>
                <div class="trending-comp-slider">
                    @foreach($events as $event)
                    <div class="trending-comp-inner-slider">
                        <div class="trending-comp-slide">
                            <div class="trending-comp-slide-img">
                            <a href="{{ route('viewEvent', ['id' => base64_encode($event->id)])}}">
                                <img src="{{ url('/storage/media/' . $event->media) }}" alt="Visa"> 
                            </a>
                                <div class="image-date">
                                <p>{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}<span>{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</span></p>
                                </div>
                                <p>EVENTS</p>
                                <div class="explore-products-restaurants">
                                    <a href="#">
                                        <img src="{{ $event->business && $event->business->business_logo ? url('/storage/media/' . $event->business->business_logo) : url('assets/webpage/images/apple.png') }}" alt="logo">  
                                        <div class="restaurant-cont-details">
                                            <h3>FINDI</h3>
                                            <p>{{ $event->business && $event->business->name ? $event->business->name : '' }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="trend-slide-cont">
                                <div class="trend-inner-slide-cont">
                                    <h4 class="heading"><i class="fa-regular fa-calendar-days"></i>{{$event['event']->user_event_type}}</h4>
                                    <a href="">
                                        <p class="description">{{$event->title}}</p>
                                    </a>
                                    <div class="loaction-des">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <a href="#" target="_blank">
                                            <p>{{ $event->location }}</p>
                                        </a>
                                    </div>
                                    <div class="phone-des">
                                        <img src="{{url('assets/webpage/images/date.png')}}" alt="Phone">
                                        <p>From {{ \Carbon\Carbon::parse($event->start_date)->format('m/d/Y') }} to {{ \Carbon\Carbon::parse($event->end_date)->format('m/d/Y') }} </p>
                                    </div>
                                </div>
                                <div class="time-like">
                                    <div class="time-des">
                                        <i class="fa-regular fa-clock"></i>
                                        <p>{{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}</p>
                                    </div>
                                    @if(Auth::guard('User')->user())
                                    <span class="heart"><i class="fa-solid fa-heart"></i></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="explore-top-events">
            <div class="container">
                <div class="explore-top-events-cont">
                    <h3 class="direct-sitemidHd">EXPLORE TOP POSTS</h3>
                    <h2 class="direct-sitecommHd">EXPLORE TOP POSTS</h2>
                </div>
                <div class="top-posts-cont">
                    @foreach($posts as $post)
                    <div class="trending-comp-slide">
                        <div class="trending-comp-slide-img">
                        <a href="{{ route('viewPost', ['id' => base64_encode($post->id)])}}">
                            <img src="{{ url('/storage/media/' . $post->image_path) }}" alt="concrete">
                        </a>
                            <div class="explore-products-restaurants">
                                <a herf="">
                                    <img src="{{ $post->business && $post->business->business_logo ? url('/storage/media/' . $post->business->business_logo) : url('assets/webpage/images/apple.png') }}" alt="logo">  
                                    <div class="restaurant-cont-details">
                                        <h3>CONCRTE</h3>
                                        <p>{{ $post->business->name }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="trend-slide-cont">
                            <div class="trend-inner-slide-cont">
                                <p><a href="#"><img src="{{\App\Helpers\ImageHelper::imageUrl('post-title.svg') }}" alt="Stack"></a>{{ $post->title}}</p>
                                <p class="description">{{ $post->description}}</p>
                            </div>
                            <div class="time-like">
                                <div class="time-des">
                                    <p><img src="{{\App\Helpers\ImageHelper::imageUrl('eye.svg') }}" alt="eye">Views:{{ $post->views}}</p>
                                </div>
                                @if(Auth::guard('User')->user())
                                <span class="heart"><i class="fa-solid fa-heart"></i></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                            <img src="{{url('assets/webpage/images/Envelope.svg')}}" alt="envelope">  
                            <input type="text" placeholder="Email address">   
                            <a href="#">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection