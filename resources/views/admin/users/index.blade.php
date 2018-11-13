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
                        	All Users
                        	<a class="btn btn-primary btn-round btn-create" href="/admin/users/create"><i class="fas fa-user-plus"></i>&nbsp&nbspAdd New User</a>
                        </h3>
                    </div>
                    
                    <div class="card-body">
						@if( count($users)>0 )
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">Name</th>
										<th scope="col">User Type</th>
										<th scope="col">Email Address
										<th scope="col"></th>
										<th scope="col"></th>
									</tr>
								</thead>	
								@foreach($users as $user)
									<tr>
										<td>{{ $user->name }}</td>
										<td>{{ $user->user_type }}</td>
										<td>{{ $user->email }}</td>
										<td>
											<a class="btn btn-info btn-round" href="/admin/users/{{ $user->id }}/edit"><i class="fas fa-pencil-alt"></i>&nbsp&nbspEdit User Details</a>
										</td>
										<td>
											<form method="POST" action="/admin/users/{{ $user->id }}">
												@method('DELETE')
												@csrf
												<button type="submit" class="btn btn-danger btn-round"><i class="fas fa-trash-alt"></i>&nbsp&nbspDelete User</button>
											</form>
										</td>
									</tr>
								@endforeach
							</table>
						@else
							<p>There are no users yet.</p>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection