@extends('dashboard')
@section('content')


<div class="container">
    <h1>All {{$user->first_name}} {{$user->last_name}} Products</h1>
    <table class="table">
        <thead>
            <tr>
            	<th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>#{{$product->id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->description}}</td>
                <td>
                    <img src="{{ asset('storage/img/'.$product->image) }}" width="300" height="auto">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $products->links() !!}
</div>

@endsection

