@extends('dashboard')
@section('content')

@if($errors->any())
<h3 style="color: red;">{{$errors->first()}}</h3>
@endif

<div class="container">
    <h1>Registration Requests</h1>
    <table class="table">
        <thead>
            <tr>
            	<th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{$request->id}}</td>
                <td>{{$request->first_name}}</td>
                <td>{{$request->last_name}}</td>
                <td>{{$request->email}}</td>
                <td>{{$request->phone}}</td>
                <td>
                    <a href="/add_user/{{$request->id}}">Add</a>
                </td>
                <td>
                    <a href="/remove_request/{{$request->id}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

