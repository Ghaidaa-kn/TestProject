@extends('dashboard')
@section('content')

    <form action="/update_user/{{$user->id}}" method="POST">
      {{ csrf_field() }}
      <h4>First Name :</h4>
      <div class="mb-3">
          <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}">
      </div>
      <h4>Last Name :</h4>
      <div class="mb-3">
          <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}">
      </div>
      <h4>Email :</h4>
      <div class="mb-3">
          <input type="text" name="email" class="form-control" value="{{$user->email}}">
      </div>
      <h4>Phone :</h4>
      <div class="mb-3">
          <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
      </div>
      <br>
      <div class="mb-3" style="text-align: center;">
        <button type="submit" class="btn btn-primary" style="width: 200px;">Update User Info
        </button>
      </div>
    </form>

    <h2>Assign Products To {{$user->first_name}}</h2>
    <div style="padding-left: 100px; padding-bottom: 70px;">
        <form action="/assign_products/{{$user->id}}" method="POST">
            {{ csrf_field() }}
            <ul>
                @foreach($can_assign as $one)
                <li>
                    <input type="checkbox" name="products[]" value="{{$one->id}}"/>
                    <label for="{{$one->id}}">{{$one->product_name}}</label>
                </li>
                @endforeach
            </ul>
            <br>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" style="width: 200px;">Assign Products</button>
            </div>
        </form>
    </div>

@endsection

