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
                        <h3 class="title">All Folders</h3>
                    </div>
                    
                    <div class="card-body">
                    	<h3>Industries:</h3>
                    	@if(count($folders)>0)
                    		@foreach($folders->chunk(2) as $chunk)
                                <div class="row">
                    		        @foreach($chunk as $folder)
                    			        <div class="col-md-6">
                        				    <h5>
                                                <div class="card content-card">
                                                    <div class="card-body"> 
                        					           <i class="fas fa-folder"></i>&nbsp&nbsp<a href="/users/folders/{{ $folder->id }}">{{ $folder->name }}</a>
                                                    </div>
                                                </div>
                    					   </h5>
                    			         </div>
                    		        @endforeach
                                </div>
                    		@endforeach
                            <br/>
                            {{ $folders->links() }}
                    	@else
                    		<h5>There are no folders yet.</h5>
                    	@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection