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
                        	@if ($folder->parent_id > 2)
								<a href="/admin/folders/{{$folder->parent_id}}">
							@elseif ($folder->parent_id == 1)
								<a href="/admin/insight-vault">
							@elseif($folder->parent_id == 2)
								<a href="/admin/innovation-toolkit">
							@endif
                        	<i class="fas fa-arrow-left"></i>Create a New Folder</a>
                        </h3>
                    </div>
                    
                    <div class="card-body">
						<h5>
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
								<div class="form-group">
									<label for="folder_type">Folder Type: </label>
									<select class="form-control" name="folder_type" style="padding:6px">
										<option value="" selected="selected">Choose a folder type</option>
										<option value="1">Insight Vault</option>
										<option value="2">Innovation Toolkit</option>
									</select>
								</div>
								<button type="submit" class="btn btn-primary btn-round">Create</button>
							</form>
						</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection