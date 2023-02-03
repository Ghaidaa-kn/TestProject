@extends('dashboard')
@section('content')


<div class="container">
    <h1>Products</h1>
    <table class="table">
        <thead>
            <tr>
            	<th>ID</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->description}}</td>
                <td>
                    <a href="/edit_product/{{$product->id}}">Edit</a>
                </td>
                <td>
                    <a href="/remove_product/{{$product->id}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $products->links() !!}
</div>

@endsection

