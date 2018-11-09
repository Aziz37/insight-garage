<script>
	
	$('#selection').on('change', function() {
	    var val = $(this).val();
	    $('#subfolder').hide();
	    $('#file').hide();
	    $('#' + val).show();
	});

</script>
