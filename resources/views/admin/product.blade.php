<h1>Products</h1>
<hr>

<form action="/admin/products/create" method="post" enctype="multipart/form-data">
    @csrf
    <input name="name" type="text" placeholder="name">
    <input name="price" type="number" placeholder="price">
    <input name="quantity" type="number" placeholder="quantity">
        <button type="submit" class="btn btn-success">Submit</button>
</form>
<ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>

