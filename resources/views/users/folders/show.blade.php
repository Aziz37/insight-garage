@extends('layouts.master')

@section('content')

	<h1>{{ $folder->name }}</h1>
	@if(Auth::user()->user_type=='contributor')
		<form method="POST" action="/users/files/upload" id="file" enctype="multipart/form-data">
			@csrf

			<label for="name">Choose file(s) to upload</label>
			<input type="file" name="file[]" multiple>

			<input type="hidden" name="folder_id" value="{{ $folder->id }}">
			
			<button type="submit">Upload</button>

		</form>
	@endif

	
		<table>
			<tr>
				<th>Name</th>
				<th>Created By</th>
				<th>Created On</th>
				<th>Last Modified On</th>
				<th></th>
			</tr>
			@foreach($subfolders as $subfolder)
				<tr>
					<td>
						<a href="/users/folders/{{ $subfolder->id }}">{{ $subfolder->name }}</a>
					</td>
					@if(isset($subfolder->user->name))
						<td>{{ $subfolder->user->name }}</td>
					@elseif(isset($subfolder->admin->name))
						<td>{{ $subfolder->admin->name }}</td>
					@endif
					<td>{{ $subfolder->created_at->toFormattedDateString() }}</td>
					<td>{{ $subfolder->updated_at->toFormattedDateString() }}</td>
				</tr>
			@endforeach

			@foreach($folder->files as $fileContents)
				<tr>
					<td>{{ $fileContents->filename }}</td>
					@if(isset($fileContents->user->name))
						<td>{{ $fileContents->user->name }}</td>
					@elseif(isset($fileContents->admin->name))
						<td>{{ $fileContents->admin->name }}</td>
					@endif
					<td>{{ $fileContents->created_at->toFormattedDateString() }}</td>
					<td>{{ $fileContents->updated_at->toFormattedDateString() }}</td>
					<td>
						<a href="/users/file/download/{{ $fileContents->id }}">Download</a>
					</td>
				</tr>
			@endforeach
			
		</table>
	

	@if ($folder->parent_id != 0)
		<a href="/users/folders/{{$folder->parent_id}}">Go back</a>
	@else
		<a href="/users/folders">Go back</a>
	@endif
	
@endsection