@extends('layouts.master')

@section('content')
	<h1>All Users</h1>

	@if( count($users)>0 )
	
		<p>
			<a href="/admin/users/create">Create new users</a>
		</p>

		<table>
	
			<tr>
				<th>Name</th>
				<th>User Type</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
	
			@foreach($users as $user)

				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->user_type }}</td>
					<td>
						
						<a href="/admin/users/{{ $user->id }}/edit">Edit User Details</a>

					</td>
					
					<td>
						
						<form method="POST" action="/admin/users/{{ $user->id }}">
							@method('DELETE')
							@csrf
							<button type="submit">Delete</button>
						</form>

					</td>

				</tr>
	
			@endforeach
	
		</table>
	
	@else
		<p>There are no users yet. Create a new user <a href="/admin/users/create">here</a></p>
	@endif

	<a href="/admin/manage">Go back to Access Management</a>


@endsection