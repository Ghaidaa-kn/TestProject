@extends('dashboard')
@section('content')

@if($errors->any())
<h3 style="color: red;">{{$errors->first()}}</h3>
@endif

<div class="container">
    <form action="/change_password" method="POST">
      {{ csrf_field() }}
      <h1 style="text-align: center;">Change Your Password</h1>
      <h4>Old Password :</h4>
      <div class="mb-3">
          <input type="password" name="old" class="form-control" required>
      </div>
      <h4>New Password :</h4>
      <div class="mb-3">
          <input type="password" name="new" class="form-control" required>
      </div>
      <h4>ReEnter New Password :</h4>
      <div class="mb-3">
          <input type="password" name="new_check" class="form-control" required>
      </div>
      <br>
      <div class="mb-3" style="text-align: center;">
        <button type="submit" class="btn btn-primary" style="width: 200px;">Change</button>
      </div>
    </form>
</div>

@endsection