@extends('layouts.master')

@section('content')

	<h1>All Folders</h1>

	@if( count($folders)>0 )
	
		<p>
			<a href="/admin/folders/create">Create new folders</a>
		</p>

		<table>
	
			<tr>
				<th>Name</th>
				<th>Created By</th>
				<th>Created On</th>
				<th>Last Modified On</th>
				<th></th>
				<th></th>
			</tr>
	
			@foreach($folders as $folder)

				<tr>
					<td>
						<a href="/admin/folders/{{ $folder->id }}">{{ $folder->name }}</a>
					</td>
					<td>{{ $folder->admin->name }}</td>
					<td>{{ $folder->created_at->toFormattedDateString() }}</td>
					<td>{{ $folder->updated_at->toFormattedDateString() }}</td>
					
					<td>
						
						<a href="/admin/folders/{{ $folder->id }}/edit">Edit</a>

					</td>
					
					<td>
						
						<form method="POST" action="/admin/folders/{{ $folder->id }}">
							@method('DELETE')
							@csrf
							<button type="submit">Delete</button>
						</form>

					</td>

				</tr>
	
			@endforeach
	
		</table>
	
	@else
		<p>There are no folders yet. Create a new folder <a href="/admin/folders/create">here</a></p>
	@endif

	<a href="/admin">Go back to Dashboard</a>
	
@endsection