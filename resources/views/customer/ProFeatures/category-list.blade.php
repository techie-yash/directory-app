@extends('layouts.customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Category Listing</h1>
            <form action="{{ route('storeCategory') }}" method="POST" class="mb-3">
                @csrf
                <div class="input-group">
                    <input type="text" id="categoryName" name="name" class="form-control" placeholder="Category Name" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </div>
            </form>
            <table class="table table-bordered" id="city-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $categorie)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$categorie['name']}}</td>  
                        <td>
                            <a href="{{url('/customer/deleteCategory/'.base64_encode($categorie['id']))}}" class="btn btn-primary">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h1>Product Listing</h1>
            <div class="d-flex justify-content-end">
                <a href="{{ route('addProduct')}}" class="btn btn-primary">Add Product</a>
            </div>
            <table class="table table-bordered" id="product-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Discount price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product['title']}}</td>  
                        <td>{{$product['description']}}</td>  
                        <td>{{$product['price']}}</td>  
                        <td>{{$product['discount_price']}}</td>  
                        <td>
                            <a href="{{url('/customer/deleteProduct/'.base64_encode($product['id']))}}" class="btn btn-primary">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection