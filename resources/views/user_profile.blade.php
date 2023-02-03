@extends('dashboard')
@section('content')

<div style="text-align: center;">
	<h1 style="padding-bottom: 70px;">My Profile Information</h1>
	<h2>ID Number : {{$user->id}}</h2>
	<h2>Full Name : {{$user->first_name}} {{$user->last_name}}</h2>
	@if($user->email != null)
	<h2>Email : {{$user->email}}</h2>
	@endif
	@if($user->phone != null)
	<h2>Phone Number : {{$user->phone}}</h2>
	@endif
</div>

@endsection