<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="side active">
						<a href="/users/home"><i class="fas fa-home"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="side">
						<a href="/users/explore"><i class="fas fa-folder-open"></i>
							<p>Start Exploring</p>
						</a>
					</li>
					<li class="side">
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="fas fa-sign-in-alt"></i><p>Logout</p>
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>	
					</li>
				</ul>
			</div>
		</div>