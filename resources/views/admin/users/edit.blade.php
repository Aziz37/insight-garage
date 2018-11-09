@extends('layouts.master')

@section('content')
	<h1>Edit User Details</h1>

	<form method="POST" action="/admin/users/{{ $user->id }}">
		@method('PATCH')
		@csrf
		
		<label for="name">Name</label>
		<input type="text" name="name" value="{{ $user->name }}" disabled>

		<label for="user_type">User Type</label>
		<select name="user_type">
			<option value="contributor">Contributor</option>
			<option value="explorer">Explorer</option>
		</select>

		<label for="email">Email</label>
		<input type="email" name="email" value="{{ $user->email }}" disabled>

		<label for="password">New Password</label>
		<input type="password" name="password">

		<label for="password-confirm">Confirm New Password</label>
		<input type="password" name="password_confirmation">

		<button type="submit">Edit</button>
	</form>

	<a href="/admin/users">Go back to User Index</a>

@endsection