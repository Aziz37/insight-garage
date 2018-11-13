		<div class="main-panel">
				<!-- Navbar -->
				<nav class="navbar navbar-expand-lg fixed-top navbar-transparent  bg-primary  navbar-absolute" >
					<div class="container-fluid">
						<div class="navbar-wrapper">	
							<div class="navbar-toggle">
								<button type="button" class="navbar-toggler">
									<span class="navbar-toggler-bar bar1"></span>
									<span class="navbar-toggler-bar bar2"></span>
									<span class="navbar-toggler-bar bar3"></span>
								</button>
							</div>
							<h5><a class="navbar-brand" href="#pablo"><i class="fas fa-user"></i>&nbsp&nbsp&nbsp{{ Auth::user()->name }}</a></h5>
						</div>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-bar navbar-kebab"></span>
							<span class="navbar-toggler-bar navbar-kebab"></span>
							<span class="navbar-toggler-bar navbar-kebab"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end" id="navigation">
							<div>
								<form method="POST" action="/admin/search">
									@csrf
									<div class="form-group">
										<div class="input-group no-border">
											<input type="text" class="form-control" name="search">
										</div>
										<button type="submit" class="btn btn-info btn-round" style="float:right"><i class="fas fa-search"></i> Search</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</nav>
				<!-- End Navbar -->