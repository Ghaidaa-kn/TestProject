@extends('dashboard')
@section('content')

    <form action="/add_product" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <h4>Product Name :</h4>
      <div class="mb-3">
          <input type="text" name="product_name" class="form-control" id="product_name">
      </div>
      <h4>Product Description :</h4>
      <div class="mb-3">
          <input type="text" name="description" class="form-control" id="description">
      </div>
      <h4>Product Image :</h4>
      <div class="mb-3">
        <input type="file" name="image" id="image" class="form-control-file" 
        accept="image/*">
      </div>
      <br>
      <div class="mb-3" style="text-align: center;">
        <button type="submit" class="btn btn-primary" style="width: 200px;">Add Product</button>
      </div>
    </form>

@endsection

