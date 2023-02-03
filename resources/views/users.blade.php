@extends('dashboard')
@section('content')


<div class="container">
    <h1>Users Informations</h1>
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
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>
                    <a href="/edit_user/{{$user->id}}">Edit</a>
                </td>
                <td>
                    <a href="/remove_user/{{$user->id}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
</div>

@endsection

