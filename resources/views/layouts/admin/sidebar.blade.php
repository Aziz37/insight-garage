<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="side active">
						<a href="/admin"><i class="fas fa-home"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="side">
						<a data-toggle="collapse" href="#databaseManagement">
		                    <i class="fas fa-database"></i>
		                    <p>Database Management <b class="caret"></b></p>
		                </a>
		                <div class="collapse" id="databaseManagement">
		                    <ul class="nav">
		                    	<li class="side">
		                    		<a href="/admin/folders/create"><span class="sidebar-normal"><i class="fas fa-folder"></i>Create New Folder</span></a>
		                    	</li>
		                        <li class="side">
		                            <a href="/admin/insight-vault"><span class="sidebar-normal"><i class="fas fa-folder-open"></i>&nbsp&nbspInsight Vault</span></a>
	                          	</li>
		                        <li class="side">
		                            <a href="/admin/innovation-toolkit"><span class="sidebar-normal"><i class="fas fa-folder-open"></i>&nbsp&nbspInnovation Toolkit</span></a>
		                        </li>
		                    </ul>
		                </div>
						
					</li>
					<li class="side">
		                <a data-toggle="collapse" href="#userManagement">
		                    <i class="fas fa-users-cog"></i>
		                    <p>User Management <b class="caret"></b></p>
		                </a>
		                <div class="collapse" id="userManagement">
		                    <ul class="nav">
		                        <li class="side">
		                            <a href="/admin/users"><span class="sidebar-normal"><i class="fas fa-users"></i>&nbsp&nbspManage Users</span></a>
	                          	</li>
		                        <li class="side">
		                            <a href="/admin/users/create"><span class="sidebar-normal"><i class="fas fa-user-plus"></i>&nbsp&nbspCreate a New User</span></a>
		                        </li>
		                    </ul>
		                </div>
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