@extends('layouts.app')

@section('content')
  <div class="container px-5">
    <?php $total = 0 ?>
      <div class="cart-list">

        @foreach($cart as $cartItem)
        <p class="cart-item">
            <span>{{$cartItem->name}}</span>
            <span>{{$cartItem->quantity}}</span>
            <span class="float-right" >{{$cartItem->price}}</span>
        </p>

        @endforeach
        <p class="cart-item">Total <span class="float-right ">{{$cartTotal}}</span></p>
      </div>
        <p>      <input type="radio" checked> <label>Pay on delivery</label>  </p>
        <form action="/order" method="POST" enctype="multipart/form-data">
            @csrf
                   <input type="number" placeholder="Phone" name="phone" class="form-control" required><br>
                   <input type="text" placeholder="Address" name="address" class="form-control" required>
                    <input type="hidden" name="total" value="{{$cartTotal}}">
            <br>
    <div class="d-flex justify-content-center"><button class="btn btn-success text-white" type="submit">Order</button>
        </form>

      </div>

  </div>

@endsection


