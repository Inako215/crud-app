@extends('layout')

@section('content')
    <h1 class="text-center display-1 m-2">Products</h1>
    <div class="d-flex justify-content-center m-2">
    <a class="btn btn-primary" href="{{ route('products.create') }}">Create New Product</a>
    </div>
    <div class="d-flex justify-content-center pt-2">
    {{ $products->links() }}
    </div>
    <table class="table table-striped w-75 mx-auto">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Price</th>
                <th class="text-center">Item Number</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class=""><img class="img-thumbnail w-25" src="{{ $product->image }}" alt="{{ $product->name }}"></td>
                <td class="align-items-center"><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                <td> ${{ $product->price }}</td>
                <td class="text-center">{{ $product->item_number }}</td>
                <td>
                    <div >
                    <a class="btn btn-primary w-100" href="{{ route('products.edit', $product->id) }}">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onSubmit="return confirm('Delete Product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2 w-100">Delete</button>
                    </form>
                    </div>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{ $products->links() }}
    </div>
@endsection