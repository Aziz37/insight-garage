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
                        	{{ $parent->name }}
                        </h3>
                    </div>
                    
                    <div class="card-body">
                    	<blockquote class="blockquote">
                    		<h5 class="title">Create new folder</h5>
							<h6>
							<form method="POST" action="/admin/folders">
									@csrf
									<div class="form-group">
										<label for="name">Folder Name: </label>
										<input type="text" class="form-control" name="name">
									</div>
									<div class="form-group">
										<label for="description">Folder Description: </label>
										<input type="text" class="form-control" name="description">
									</div>
									<input type="hidden" name="folder_type" value="2">
									<button type="submit" class="btn btn-primary btn-round">Create</button>
								</form>
							</h6>
                    	</blockquote>
						@if (count($folders)>0)
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
							@foreach($folders as $folder)
								<tr>
									<th scope="row">
										<i class="fas fa-folder"></i>&nbsp&nbsp<a href="/admin/folders/{{ $folder->id }}">{{ $folder->name }}</a>
									</th>
									<td>{{ $folder->admin->name }}</td>
									<td>{{ $folder->description }}</td>
									<td>{{ $folder->created_at->toFormattedDateString() }}</td>
									<td>{{ $folder->updated_at->toFormattedDateString() }}</td>
									<td>						
										<a class="btn btn-info btn-round" href="/admin/folders/{{ $folder->id }}/edit"><i class="fas fa-pencil-alt"></i>&nbsp&nbspEdit</a>
									</td>
									<td>
										<form method="POST" action="/admin/folders/{{ $folder->id }}">
											@method('DELETE')
											@csrf
											<button type="submit" class="btn btn-danger btn-round"><i class="fas fa-trash-alt"></i>&nbsp&nbspDelete</button>
										</form>
									</td>
								</tr>
							@endforeach
							</table>
						@else
							<p class="h5">There are no folders yet.</p>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection