	<div class="container" style="margin-top:20px;">
		<footer class="text-center">
		<hr>
			<div class="col-md-12">Copyright ©2016
			<br>
			<br>
			</div>
		</footer>
	</div> 
    <script src="<?php echo $url ?>assets/js/jquery.js"></script> 
    <script src="<?php echo $url ?>assets/bootstrap/js/bootstrap.min.js"></script> 
	<script src="<?php echo $url ?>assets/bootstrap/js/moment.js"></script>
	<script src="<?php echo $url ?>assets/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
		$(function () {
			$('#datetimepicker').datetimepicker({
				format: 'YYYY-MM-DD',
            });
			$('#datetimepicker2').datetimepicker({
				format: 'YYYY-MM-DD',
			});
		});
	</script>
  </body>
</html>
