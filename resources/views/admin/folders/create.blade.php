@extends('layouts.master')

@section('content')

	<h1>Create a New Folder</h1>

	<form method="POST" action="/admin/folders"> 

		@csrf

		<label for="name">Folder Name: </label>
		<input type="text" name="name">

		<button type="submit">Create</button>
	</form>

@endsection