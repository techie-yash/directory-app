@extends('layouts.admin')
@section('content')
 <div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">FAQ Page</h5>
                    <!-- FAQ Form -->
            <form method="POST" action="{{ route('faq.store') }}" class="mt-3">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="title" placeholder="Enter a question" required></textarea>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="content" placeholder="Enter an answer" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add FAQ</button>
            </form>
        </div>
    </div>




        <!-- FAQ Listing -->
        
        <div class="accordion mt-5" id="accordionFlushExample">
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading{{ $faq->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $faq->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $faq->id }}">
                            {{ $faq->title }}
                        </button>
                    </h2>
                    <div id="flush-collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $faq->id }}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="faq-content">{{ $faq->content }}</div><br/>
                            <div class="faq-footer">
                                <a href="{{route('faq.destroy', array('id' => base64_encode($faq['id'])))}}" class="btn btn-danger mt-3">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


   
