@extends('layouts.admin.master')

@section('content')
	<div class="panel-header panel-header-sm d-flex justify-content-center">
		@if ($flash = session('message'))
			<div id="alert" class="alert alert-info fade show" role="alert">
				<strong>{{ $flash }}</strong>
			</div>
			<!-- <div id="alert" class="alert alert-info alert-dismissible fade show" role="alert">
				<strong>{{ $flash }}</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div> -->
		@endif
    </div>

     <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-header">
                        <h3 class="title">
                        	@if ($folder->parent_id > 2)
								<a href="/admin/folders/{{$folder->parent_id}}">
							@elseif ($folder->parent_id == 1)
								<a href="/admin/insight-vault">
							@elseif($folder->parent_id == 2)
								<a href="/admin/innovation-toolkit">
							@endif
                        	<i class="fas fa-arrow-left"></i> {{ $folder->name }}</a>
                        </h3>
                    </div>
                    
                    <div class="card-body">
						<blockquote class="blockquote">
							<h5 class="title">Create new</h5>
							<h6>
								<div class="form-group">
									<select class="form-control" id="selection">
										<option value="" selected="selected">choose option</option>
										<option value="subfolder">subfolder</option>
										<option value="file">file</option>
									</select>
								</div>
	
								<form method="POST" action="/admin/subfolders" id="subfolder" style="display:none"> 
									@csrf
									<div class="form-group">
										<label for="name">Folder Name: </label>
										<input type="text" class="form-control" name="name">
									</div>
									<div class="form-group">
										<label for="name">Folder Description:</label>
	    								<input type="text" class="form-control" name="description" value="{{ $folder->description }}">
	    							</div>
									<input type="hidden" name="parent_id" value="{{ $folder->id }}">
									<button type="submit" class="btn btn-primary btn-round">Create</button>
								</form>

								<form method="POST" action="/admin/files/upload" id="file" enctype="multipart/form-data" style="display:none">
									@csrf
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="customFile" name="file[]" multiple>
										<label class="custom-file-label" for="customFile">Choose file(s) to upload</label>

										<input type="hidden" name="folder_id" value="{{ $folder->id }}">
									</div>
									<button type="submit" class="btn btn-primary btn-round">Upload</button>
								</form>
							</h6>
						</blockquote>
						
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Description</th>
									<th scope="col">Created By</th>
									<th scope="col">Created On</th>
									<th scope="col">Last Modified On</th>
									<th scope="col"></th>
									<th scope="col"></th>
								</tr>
							</thead>
							@foreach($subfolders as $subfolder)
								<tr>
									<th scope="row">
										<a href="/admin/folders/{{ $subfolder->id }}"><i class="fas fa-folder"></i> {{ $subfolder->name }}</a>
									</th>
									<td>{{ $subfolder->description }}</td>
									<td>{{ $subfolder->admin->name }}</td>
									<td>{{ $subfolder->created_at->toFormattedDateString() }}</td>
									<td>{{ $subfolder->updated_at->toFormattedDateString() }}</td>
									<td>						
										<a class="btn btn-info btn-round" href="/admin/subfolders/{{ $subfolder->id }}/edit"><i class="fas fa-pencil-alt"></i>&nbsp&nbspEdit</a>
									</td>
									<td>
										<form method="POST" action="/admin/subfolders/{{ $subfolder->id }}">
											@method('DELETE')
											@csrf
											<button type="submit" class="btn btn-danger btn-round"><i class="fas fa-trash-alt"></i>&nbsp&nbspDelete</button>
										</form>
									</td>
								</tr>
							@endforeach
							@foreach($folder->files as $fileContents)
								<tr>
									<th scope="row">{{ $fileContents->filename }}</th>
									<td></td>
									@if(isset($fileContents->user->name))
										<td>{{ $fileContents->user->name }}</td>
									@elseif(isset($fileContents->admin->name))
										<td>{{ $fileContents->admin->name }}</td>
									@endif

									<td>{{ $fileContents->created_at->toFormattedDateString() }}</td>
									<td>{{ $fileContents->updated_at->toFormattedDateString() }}</td>
									<td>
										<a class="btn btn-info btn-round" href="/admin/file/download/{{ $fileContents->id }}"><i class="fas fa-download"></i>&nbsp&nbspDownload</a>
									</td>
									<td>
										<form method="POST" action="/admin/file/{{ $fileContents->id }}">
											@method('DELETE')
											@csrf
											<button type="submit" class="btn btn-danger btn-round"><i class="fas fa-trash-alt"></i>&nbsp&nbspDelete</button>
										</form>
									</td>

								</tr>
							@endforeach	
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection