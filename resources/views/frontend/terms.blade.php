@extends('layouts.frontend')
@section('content')
<section class="pricing-banner" style="background-image: url('{{ url('assets/webpage/images/terms-bg.png') }}');">
    <div class="container">
        <h1>Terms</h1>
    </div>
</section>
<section class="terms-cont">
    <div class="container">
        <div class="terms-inner">
            <h3>Terms of use</h3>
            {!! $terms->description !!}
        </div>
    </div>
</section>
@endsection