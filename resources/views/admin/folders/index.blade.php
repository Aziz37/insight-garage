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
                        	All Folders
                        	<a class="btn btn-primary btn-round btn-create" href="/admin/folders/create"><i class="fas fa-plus"></i>&nbsp&nbspAdd New Folder</a>
                        </h3>
                    </div>
                    
                    <div class="card-body">
						@if (count($folders)>0)
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">Name</th>
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
									</td>
									<td>{{ $folder->admin->name }}</td>
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
@endsection