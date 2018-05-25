<style type="text/css">
	.container {
		margin-top: 10vh;
	}
	.header {
		margin-bottom: 10vh;
	}
	.col-form-label {
		padding-top: 20px;
	}
	.content_bar {
		margin-bottom: 20px;
		margin-top: 10px;
	}
	.footer {
		margin-top: 20px;
	}
</style>

<body>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="header">Login</h2>
				<form class="form" method="POST" action="<?php echo base_url()?>login/log_in" id="login_form">
                    <div class="row content_bar">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <div class="form-group bmd-form-group">
                             <input class="form-control" name="log_username" type="email" required="true">
                          </div>
                        </div>
                    </div>

                    <div class="row content_bar">
                        <label class="col-sm-2 col-form-label">Password</label>

                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" name="log_password" type="password" required="true">
                            </div>
                        </div>
                    </div>

                    <div class="row footer">
                        <div class="col-sm-8 col-md-offset-2">
                        	<a type="submit" id="login_btn" class="btn btn-fill btn-info">Sign in</a>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var log_name = $("input[name='log_username']");
		var log_password = $("input[name='log_password']");
		//------------- login form validate ---------------------
		var l_check_url = "<?php echo base_url() ?>login/check_log_info";
		$("#login_btn").click(function() {
			var l_name = log_name.val();
			var l_password = log_password.val();
			if (l_name.length != 0 && l_password.length != 0) {
				$.ajax({
					url: l_check_url,
					data: {"username": l_name, "password": l_password},
					type: "POST",
					success: function(rpn) {
						console.log(rpn);
						if(parseInt(rpn) > 0) {
							$('#login_form').submit();
						} else {
							demo.showSwal('auto-close')
							$('#login_faild').css('display', 'block');
						}
					}
				})
			} else {
				$('#login_form').submit();
			}
		})
	</script>
</body>