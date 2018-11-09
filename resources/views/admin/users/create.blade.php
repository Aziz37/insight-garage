@extends('layouts.master')

@section('content')
	<h1>Create New User</h1>

	<form method="post" action="/admin/users">
		@csrf

		<label for="name">Name</label>
		<input type="text" name="name">

		<label for="user_type">User Type</label>
		<select name="user_type">
			<option value="" selected="selected">Choose User Type</option>
			<option value="contributor">Contributor</option>
			<option value="explorer">Explorer</option>
		</select>

		<label for="email">Email</label>
		<input type="email" name="email">

		<label for="password">Password</label>
		<input type="password" name="password">

		<label for="password-confirm">Confirm Password</label>
		<input type="password" name="password_confirmation">

		<button type="submit">Create user</button>
	</form>

	<a href="/admin/users">Go Back to User Index</a>
@endsection