@extends('layouts.master')

@section('content')

	<h1>Edit Folder Details</h1>

	<form method="POST" action="/admin/folders/{{ $folder->id }}">
		@method('PATCH')
		@csrf
		<label for="name">Folder Name: </label>
		<input type="text" name="name" value="{{ $folder->name }}">

		<button type="submit">Edit</button>
	</form>

@endsection