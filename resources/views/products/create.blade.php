@extends('layout')

@section('content')

    <h1 class="text-center display-1 m-2">Create New Product</h1>

    <div class="container">
        <div class="col-6 mx-auto">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('products.form')
            <div class="row d-flex justify-content-center">
            <button type="submit" class="btn btn-primary col-4 m-2">Submit</button>
            <a class="btn btn-secondary d-flex justify-content-center col-4 m-2" href="{{ route('products.index') }}">Cancel</a>
            </div>
        </form>
    </div>
    </div>

@endsection