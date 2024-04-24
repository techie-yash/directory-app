@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>Add Terms&Conditions</h1>
    <form method="POST" action="{{ route('updateTerms')}}">
        @csrf
        @method('PUT') 
        <div class="mb-3">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="2" >{{ $term->description}}</textarea>
        </div>
        <div class="text-center mt-3"> 
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection