@extends('layouts.frontend')
@section('content')
<section class="pricing-banner" style="background-image: url('{{ url('assets/webpage/images/faqs.png') }}');">
    <div class="container">
        <h1>FAQ’s</h1>
    </div>
</section>
<section class="faqs">
    <div class="container">
        <div class="faqs-cont">
            <h4>NEW</h4>
            <h3>Frequently Asked Question</h3>
            <p>Simple Transparent pricing for everyone, whether you are owner or an agents.</p>
        </div>
    </div>
</section>
<section class="container faqs-accordian" aria-label="Frequently Asked Questions">
    @foreach($faqs as $faq)
    <details>
        <summary>
            <span class="faq-title">{{$faq->title}}?</span>
            <!-- Plus Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus expand-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                <path d="M9 12l6 0"></path>
                <path d="M12 9l0 6"></path>
            </svg>
            <!-- Minus Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus expand-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                <path d="M9 12l6 0"></path>
            </svg>
        </summary>
        <div class="faq-content">
        {{$faq->content}}.
        </div>
    </details>
    @endforeach
</section>
@endsection