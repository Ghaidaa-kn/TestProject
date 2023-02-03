@extends('dashboard')
@section('content')

    <div style="padding-bottom: 50px;">
        <h1>{{$product->product_name}}</h1>
        <h2>{{$product->description}}</h2>
    </div>
    <div>
      <img style="border-radius: 8px; display: block; margin-left: auto; margin-right: auto;
      width: 50%;" src="{{ asset('storage/img/'.$product->image) }}" width="30%">
    </div>

@endsection