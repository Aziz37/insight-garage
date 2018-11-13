@extends('layouts.admin.master')

@section('content')
	<div class="panel-header panel-header-sm">
    </div>
	
     <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-header">
                        <h3 class="title">
                        	<a href="/admin/folders"><i class="fas fa-arrow-left"></i></a>
                        	Edit Folder Details
                        </h3>
                    </div>
                    
                    <div class="card-body">
						<h5>
							<form method="POST" action="/admin/subfolders/{{ $folder->id }}">
								@method('PATCH')
								@csrf
								<div class="form-group">
	    							<label for="name">Folder Name:</label>
	    							<input type="text" class="form-control" value="{{ $folder->name }}" name="name" required>
	    						</div>
	    						<div class="form-group">
	    							<label for="name">Folder Description:</label>
	    							<input type="text" class="form-control" name="description" value="{{ $folder->description }}">
	    						</div>
								<button type="submit" class="btn btn-primary btn-round">Edit</button>
							</form>
						</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection