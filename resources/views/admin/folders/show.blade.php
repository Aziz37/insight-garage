@extends('layouts.master')

@section('content')

	<h1>{{ $folder->name }}</h1>

	<h2>
		Create new
			<select id="selection">
				<option value="" selected="selected">choose option</option>
				<option value="subfolder">subfolder</option>
				<option value="file">file</option>
			</select>
	</h2>
	
	<form method="POST" action="/admin/subfolders" id="subfolder" style="display:none"> 

		@csrf

		<label for="name">Folder Name: </label>
		<input type="text" name="name">

		<input type="hidden" name="parent_id" value="{{ $folder->id }}">

		<button type="submit">Create</button>
	</form>

	<form method="POST" action="/admin/files/upload" id="file" enctype="multipart/form-data" style="display:none">
		@csrf

		<label for="name">Choose file(s) to upload</label>
		<input type="file" name="file[]" multiple>

		<input type="hidden" name="folder_id" value="{{ $folder->id }}">
		
		<button type="submit">Upload</button>

	</form>

	
		<table>
			<tr>
				<th>Name</th>
				<th>Created By</th>
				<th>Created On</th>
				<th>Last Modified On</th>
				<th></th>
				<th></th>
			</tr>
			@foreach($subfolders as $subfolder)
				<tr>
					<td>
						<a href="/admin/folders/{{ $subfolder->id }}">{{ $subfolder->name }}</a>
					</td>
					@if(isset($subfolder->user->name))
						<td>{{ $subfolder->user->name }}</td>
					@elseif(isset($subfolder->admin->name))
						<td>{{ $subfolder->admin->name }}</td>
					@endif
					<td>{{ $subfolder->created_at->toFormattedDateString() }}</td>
					<td>{{ $subfolder->updated_at->toFormattedDateString() }}</td>
					<td>
						<a href="/admin/subfolders/{{ $subfolder->id }}/edit">Edit</a>
					</td>
					<td>
						<form method="POST" action="/admin/subfolders/{{ $subfolder->id }}">
							@method('DELETE')
							@csrf
							<button type="submit">Delete</button>
						</form>
					</td>
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
						<a href="/admin/file/download/{{ $fileContents->id }}">Download</a>
					</td>
					<td>
						<form method="POST" action="/admin/file/{{ $fileContents->id }}">
							@method('DELETE')
							@csrf
							<button type="submit">Delete</button>
						</form>

					</td>

				</tr>
			@endforeach
			
		</table>
	

	@if ($folder->parent_id != 0)
		<a href="/admin/folders/{{$folder->parent_id}}">Go back</a>
	@else
		<a href="/admin/folders">Go back</a>
	@endif
	
@endsection