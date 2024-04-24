<footer>
    <div class="container">
        <div class="ftr-cont">
            <div class="ftr-cont-lt">
                <a href="{{ route('webpage')}}">
                    <img src="{{url('assets/webpage/images/Alamoody.svg')}}" alt="Alamoody">  
                </a>
                <p>3071 Al Amir, Dist, محمد بن عبدالعزيز، Al-Rehab, جدة 23345, Saudi Arabia</p>
                <p>Phone:<a href="#">+966 12 671 5621</a></p>
                <p>Mail:<a href="#">Info@Alamoody.com</a></p>
                <ul>
                    <li><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/intent/tweet?text=Your+share+text+comes+here&url=https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="https://www.youtube.com/watch?v=BGyuKpfMB9E"><i class="fa-brands fa-youtube"></i></a></li>
                    <li><a href="https://www.instagram.com/accounts/login/"><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="ftr-cont-rt">
                <div class="ftr-cont-rt-row">
                    <h3>Supports</h3>
                    <ul>
                        <li><a href="{{ route('contacUs')}}">Contact</a></li>
                        <li><a href="{{ route('faq')}}">FAQs</a></li>  
                        <li><a href="{{ route('pricing')}}">Pricing Plans</a></li>
                    </ul>
                </div>
                <div class="ftr-cont-rt-row">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="{{ route('aboutUs')}}">About</a></li>
                        <li><a href="{{ route('terms')}}">Terms</a></li>
                        <li><a href="{{ route('pricing')}}">Get Membership</a></li>
                        <li><a href="{{ route('customer.login')}}">Add a Business</a></li>
                        <li><a href="{{ route('advertiseWithUs')}}">Advertise With Us</a></li>
                    </ul>
                </div>
                <div class="ftr-cont-rt-row">
                    <h3>Category</h3>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('uiDirectory', ['id' => base64_encode($category->id), 'slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>

                </div>
                <div class="ftr-cont-rt-row social-apps">
                    <h3>Download our app</h3>
                    <ul>
                        <li><a href="https://play.google.com/store/games?device=windows&utm_source=apac_med&hl=en-IN&utm_medium=hasem&utm_content=Oct0121&utm_campaign=Evergreen&pcampaignid=MKT-EDR-apac-in-1003227-med-hasem-py-Evergreen-Oct0121-Text_Search_BKWS-BKWS%7CONSEM_kwid_43700065205026376_creativeid_535350509651_device_c&gclid=CjwKCAiAs6-sBhBmEiwA1Nl8s_BJrDkb7H04SHU_8cPKSWg8ZR3s17FpOHIh2MZhnP_oGnylYipw5xoCRl0QAvD_BwE&gclsrc=aw.ds&pli=1"><img src="{{url('assets/webpage/images/google-play.png')}}" alt="Play Store"></a></li>
                        <li><a href="https://www.apple.com/in/app-store/"><img src="{{url('assets/webpage/images/app-store.png')}}" alt="App Store"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>