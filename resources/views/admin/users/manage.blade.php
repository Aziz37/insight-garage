@extends('layouts.master')

@section('content')

	<h1>Manage User Accounts</h1>
	
	<ul>
	
		<li>
			<a href="/admin/users">Manage User Details</a>
		</li>
		<li>
			<a href="/admin/users/create">Create New User</a>
		</li>
	
	</ul>

	<a href="/admin">Go back to Dashboard</a>
@endsection