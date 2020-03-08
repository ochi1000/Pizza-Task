@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Orders</h3>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Users phone</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Cost</th>
            <th scope="col">Address</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
          <tr>
            <th scope="col">{{$order->id}}</th>
            <th scope="col">{{$order->user_phone}}</th>
            <th scope="col">{{$order->product_name}}</th>
            <th scope="col">{{$order->quantity}}</th>
            <th scope="col">{{$order->total_cost}}</th>
            <th scope="col">{{$order->address}}</th>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection
