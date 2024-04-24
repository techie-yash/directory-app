@extends('layouts.admin')
 <!-- Assuming you have a layout file -->
@section('content')
<style>
    .custom-list-item {
        margin-right: 10px; /* Adjust this value to control the spacing */
    }
</style>
<div class="container mt-4">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Features</h5>
                <form action="{{ route('storefeatures')}}" method="post" class="form-inline">
                    @csrf
                    <div class="form-group ">
                        <input type="text" name="name" placeholder="Add a feature" class="form-control mr-2">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
          </div>


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Features List</h5>

              <ul class="list-group">
                @php $count = 0; @endphp
                @foreach ($features as $feature)
                    @if ($count % 3 == 0)
                        @if ($count > 0)
                            </div> <!-- Close the previous row -->
                        @endif
                        <div class="row mt-4">
                    @endif
                    <li class="list-group-item col-md-3 d-flex justify-content-between align-items-center custom-list-item">
                        <div>
                            <input type="checkbox" id="feature_{{ $feature->id }}" name="feature_{{ $feature->id }}" class="mr-2 mt-2">
                            {{ $feature->name }}
                        </div>
                        <a href="{{ url('destroy-features/'.base64_encode($feature->id))}}" class="text-danger delete" data-id="{{ $feature->id}}">
                            <i class="fas fa-trash-alt"></i> 
                        </a>     
                    </li>
                    @php $count++; @endphp
                @endforeach
                </div> <!-- Close the last row if necessary -->
            </ul>

            </div>
          </div>


    </div>
@endsection