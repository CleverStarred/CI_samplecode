<style type="text/css">
	.container {
		margin-top: 30vh;
	}
	.header {
		margin-bottom: 10vh;
	}
</style>

<body>
	<div class="container">
		<h2 class="header text-center">Home Page</h2>
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="col-md-5 text-right">
					<a class="btn btn-info btn-round btn-lg" href="<?php echo base_url()?>login">
	                    Login
	                </a>
				</div>
				<div class="col-md-5 text-left col-lg-offset-2">
					<a class="btn btn-info btn-round btn-lg" href="<?php echo base_url()?>signup">
	                    SignUp
	                </a>
				</div>
			</div>
		</div>
	</div>
</body>