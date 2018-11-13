@extends('layouts.user.master')

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
								<a href="/users/folders/{{$folder->parent_id}}">
							@elseif ($folder->parent_id == 1)
								<a href="/users/insight-vault">
							@elseif($folder->parent_id == 2)
								<a href="/users/innovation-toolkit">
							@endif
                        	<i class="fas fa-arrow-left"></i></a> {{ $folder->name }}
                        </h3>
                    </div>
                    
                    <div class="card-body">
						@if(Auth::user()->user_type=='contributor')
							<blockquote class="blockquote">
							<h5>Upload files to {{ $folder->name }}:</h5>
							<form method="POST" action="/users/files/upload" id="file" enctype="multipart/form-data">
								@csrf

								<input type="hidden" name="folder_id" value="{{ $folder->id }}">
								
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="customFile" name="file[]" multiple required>
									<label class="custom-file-label" for="customFile">Choose file</label>
								</div>

								<button type="submit" class="btn btn-info">Upload</button>

							</form>
						</blockquote>
						@endif

						<h3>Contents:</h3>
						@foreach($subfolders->chunk(2) as $chunk)
							<div class="row">
								@foreach($chunk as $subfolder)
									<div class="col-md-6">
		                				<h5>
		                					<div class="card content-card">
		            							<div class="card-body">	
		                							<i class="fas fa-folder"></i><a href="/users/folders/{{ $subfolder->id }}">&nbsp&nbsp{{ $subfolder->name }}</a>
		                						</div>
		                					</div>
		            					</h5>
	                				</div>
	                			@endforeach
	            			</div>
	            		@endforeach

	            		@foreach($folder->files->chunk(2) as $chunks)
	            			<div class="row">
	            				@foreach($chunks as $fileContents)
	            					<div class="col-md-6">
		            					<h5>
		            						<div class="card content-card">
		            							<div class="card-body">	
			            							<i class="fas fa-download"></i>&nbsp&nbsp<a href="/users/file/download/{{ $fileContents->id }}">{{ $fileContents->filename }}</a>
			            						</div>
			            					</div>
		            					</h5>
	            					</div>
	            				@endforeach
	            			</div>
	            		@endforeach
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection