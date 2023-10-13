@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-12 mt-4">
            <h1>{{$product->name}}</h1>
            <p>{{$product->description}}</p>
            <img src="/products/{{$product->image}}" class="rounded" width="70%" />
        </div>
    </div>

@endsection