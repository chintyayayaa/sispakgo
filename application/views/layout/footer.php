<!-- Footer -->
<footer id="footer" class="page-footer font-small unique-color-dark pt-4">


	<!-- Copyright -->
	<div class="footer-copyright text-center py-3">© 2020 Copyright: Universitas Negeri Jakarta
		<!-- <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a> -->
	</div>
	<!-- Copyright -->

</footer>
<!--/.Footer-->

<script>
	$(function () {
		$(".sticky").sticky({
			topSpacing: 10,
			zIndex: 2,
			stopper: "#footer"
		});
	});

	// Material Select Initialization
	$(document).ready(function() {
		$('.mdb-select').materialSelect();

		// Data Picker Initialization
		$('.datepicker').pickadate({
			
		});
	});
</script>

</body>

</html>
