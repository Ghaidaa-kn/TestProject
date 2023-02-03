@extends('dashboard')
@section('content')


<div class="container">
    <h1>All Users With There Products</h1>
    <table class="table">
        <thead>
            <tr>
            	<th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>#{{$user->id}}</td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>
                    <a href="/edit_user_products/{{$user->id}}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
</div>

@endsection

