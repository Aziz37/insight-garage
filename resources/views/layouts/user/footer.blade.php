<footer class="footer" >
				<div class="container">
					<nav>
						<p><strong>Business Innovation | Digital Division</strong></p>
					</nav>
					
					<div class="copyright" id="copyright">
						<img src="{{ asset('img/gp_logo.png') }}" alt="gp_logo" style="width:155px; height:35px"> 
					</div>
				</div>
			</footer>
		</div>
	</div>

	<!--   Core JS Files   -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/core/jquery.min.js') }}"></script>
	<script src="{{ asset('js/core/popper.min.js') }}"></script>
	<script src="{{ asset('js/core/bootstrap.js') }}"></script>
	<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

	@include('layouts.scripts')
	
	<!--  Google Maps Plugin    -->
	<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>

	<!-- Chart JS -->
	<script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>

	<!--  Notifications Plugin    -->
	<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>

	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
