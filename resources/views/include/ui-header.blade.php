<header>
    <div class="announcement-bar">
        <div class="container">
            <div class="announcement-bar-cont">
                <div class="contact-details">
                    <div class="phone-number">
                        <a href="#">
                        <i class="fa-solid fa-phone"></i>
                        <p>Call Us: (+966) 23456789</p>
                        </a>
                    </div>
                    <div class="mail-details">
                    <a href="#">
                        <i class="fa-regular fa-envelope"></i>
                        <p>Email: info@alamoody.com</p>
</a>
                    </div>
                </div>
                <div class="social-details">
                    <div class="share-icon">
                    <a href="#">
                        <i class="fa-solid fa-share-nodes"></i>
                        <p>Follow Us On:</p>
</a>
                    </div>
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/intent/tweet?text=Your+share+text+comes+here&url=https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/watch?v=BGyuKpfMB9E"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="https://www.instagram.com/accounts/login/"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bar">
        <div class="container">
            <div class="header-bar-cont">
                <div class="logo">
                    <a href="{{ route('webpage')}}">
                        <img src="{{url('assets/webpage/images/Alamoody.svg')}}" alt="Alamoody">
                    </a>
                </div>
                <div class="header-bar-cont-rt">
                    <nav>
                        <ul class="nav-bar">                      
                            <li><a href="{{ route('webpage')}}">{{trans('messages.Home')}}</a> </li>            
                            <li><a href="{{ route('aboutUs')}}">{{trans('messages.About us')}}</a> </li>
                            <li><a href="{{ route('terms')}}">{{trans('messages.Terms')}}</a> </li>
                            <li><a href="{{ route('faq')}}">{{trans('messages.FAQ')}}</a> </li>
                            <li><a href="{{ route('pricing')}}">{{trans('messages.Pricing')}}</a> </li>
                            <li><a href="{{ route('contacUs')}}">{{trans('messages.Contact Us')}}</a> </li>         
                        </ul>
                    </nav>
                    <div class="language-dropdown">
                        <button id="language-btn" class="language-btn">
                        @if(session('locale') == 'en')
                            <span id="selected-language-icon" class="flag-icon flag-icon-us"></span>
                        @elseif(session('locale') == 'ar')
                            <span id="selected-language-icon" class="flag-icon flag-icon-mx"></span>
                        @endif
                            <span id="selected-language">{{trans('messages.Language')}}</span>
                            <span class="caret"></span>
                        </button>
                        <div id="language-options" class="language-options">
                            <div class="language-option" data-lang="en">
                                <span class="flag-icon flag-icon-us"></span> 
                                <a class="collapse-item" href="{{ route('setlocale', 'en') }}">{{trans('messages.English')}}</a> 
                            </div>
                            <div class="language-option" data-lang="ar">
                                <span class="flag-icon flag-icon-mx"></span> 
                                <a class="collapse-item" href="{{ route('setlocale', 'ar') }}">{{trans('messages.Arabic')}}</a>       
                            </div>
                        </div>
                    </div>
                    <div class="hdr-right-cont">
                        @if(Auth::guard('User')->user())
                        <div class="profile-icon"><a href="{{ route('dashboardUserPanel')}}"><i class="fa-regular fa-circle-user"></i></a></div>
                        @else
                        <div class="profile-icon"><a href="{{ route('userPanelLogin')}}"><i class="fa-regular fa-circle-user"></i></a></div>
                        @endif
                        <div class="get-listed">
                            <a href="#">
                            <div class="get-listed-img"><i class="fa-solid fa-plus"></i></div>
                            <p>Get Listed</p>
                            </a>
                        </div>
                        <div class="bar-crumb"><a href="#"><i class="fa-solid fa-bars"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
