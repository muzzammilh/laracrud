@extends('layouts.app')

@section('content')
        <div class="text-end">
            <a href="{{ route('products.create') }}" class="btn btn-dark mt-2">Create Product</a>
        </div>
        <h1>Products</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
              <tr>
                <th scope="row">{{ $product->id }}</th>
                <td><a class="text-dark" href="{{ route('products.view', ['product' => $product]) }}"> {{ $product->name }} </a></td>
                <td><img src="products/{{ $product->image }}" class="rounded-circle" width="30" height="30" /> </td>
                <td>
                    <a href="{{ route('products.edit', ['product' => $product]) }}" class="btn btn-dark btn-sm">Edit</a>
                    <!-- <a href="delete/{{$product->id}}" class="btn btn-danger btn-sm">Delete</a> -->
                    <form method="POST" action="{{ route('products.delete', ['product' => $product]) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          {{ $products->links() }}
    </div>

@endsection
