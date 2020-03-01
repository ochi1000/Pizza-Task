@extends('layouts.app')

@section('content')
  <div class="container px-5">
    <?php $total = 0 ?>
      <div class="cart-list">

        @if(session('cart'))
            @foreach(session('cart') as $id => $item)
            <?php $total += $item['price'] * $item['quantity'] ?>
        <p class="cart-item">
            <span>{{$item['name']}}</span>
        <span><input id="quantity" type="number" data-id="{{$id}}" value="{{$item['quantity']}}" oninput="updateCart(this)"/></span>
            <span class="float-right" >{{$item['price']}}</span>
        </p>

            @endforeach
        @endif
        <p class="cart-item">Total <span class="float-right ">{{$total}}</span></p>
      </div>
        <p>      <input type="radio" checked> <label>Pay on delivery</label>  </p>
        <form action="/order" method="POST" enctype="multipart/form-data">
            @csrf
                   <input type="number" placeholder="Phone" name="phone" class="form-control" required><br>
                   <input type="text" placeholder="Address" name="address" class="form-control" required>
                    <input type="hidden" name="totalCost" value="{{$total}}">
            <br>
    <div class="d-flex justify-content-center"><button class="btn btn-success text-white" type="submit">Order</button>
        </form>

      </div>

  </div>

<script type="text/javascript">
    function updateCart(e){
        var ele = $(this);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{ url('update-cart') }}',
            method: "patch",
            data: {_token: CSRF_TOKEN, id: ele.attr("data-id"), quantity: ele.attr("value")},
            success: function (response) {
                window.location.reload();
                // console.log(e.value);
            }
        });
    }

</script>
@endsection


