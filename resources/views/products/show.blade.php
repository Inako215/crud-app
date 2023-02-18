@extends('layout')

@section('content')
<h1 class="text-center display-2">Product Details</h1>
<div class="container">
<div class="card m-3">
    <div class="card-body text-center">
        <img class="card-img" src="{{ $product->image }}" alt="{{ $product->name }}">
        <h5 class="card-title fs-2 p-2">{{ $product->name }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text fw-bold">Price: ${{ $product->price }}</p>
        <p class="card-text">Item Number: {{ $product->item_number }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">All Products</a>
    </div>
</div>
</div>
@endsection