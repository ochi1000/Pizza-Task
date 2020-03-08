@extends('layouts.app')

@section('content')
<div class='container '>
    <div class="row">

        @foreach ($products as $product)

        <div class="col-6">
            <div class="card">
                <img src="{{ asset('/images/pizza4.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">{{$product->name}}</p>
                  <button data-id="{{$product->id}}" class="btn btn-success addToCart">Add to cart {{$product->price}}</button>
                </div>
              </div>
        </div>

        @endforeach

    </div>
    <div class="d-flex justify-content-center">
        <a href="/cart" class="btn btn-success">Make Order</a>
    </div>
</div>

@endsection

