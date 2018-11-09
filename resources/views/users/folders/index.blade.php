@extends('layouts.master')

@section('content')

	<h1>All Folders</h1>

	@if( count($folders)>0 )
	
		<table>
	
			<tr>
				<th>Name</th>
				<th>Created By</th>
				<th>Created On</th>
				<th>Last Modified On</th>
			</tr>
	
			@foreach($folders as $folder)

				<tr>
					<td>
						<a href="/users/folders/{{ $folder->id }}">{{ $folder->name }}</a>
					</td>
					@if(isset($folder->user->name))
						<td>{{ $folder->user->name }}</td>
					@elseif(isset($folder->admin->name))
						<td>{{ $folder->admin->name }}</td>
					@endif
					<td>{{ $folder->created_at->toFormattedDateString() }}</td>
					<td>{{ $folder->updated_at->toFormattedDateString() }}</td>
				</tr>
	
			@endforeach
	
		</table>
	
	@else
		<p>There are no folders yet.
	@endif

	<a href="/home">Go back to Dashboard</a>
	
@endsection