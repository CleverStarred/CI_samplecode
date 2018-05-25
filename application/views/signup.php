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
	.hide {
		display: none !important;
	}
	.show {
		display: block !important;
	}
</style>

<body>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="header">Signup</h2>
				<form class="form" method="POST" action="<?php echo base_url()?>signup/register" id="signup_form">
                    <div class="row content_bar">
                        <label class="col-sm-3	 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <div class="form-group bmd-form-group">
                             <input class="form-control" name="sign_email" type="email" required="true">
                             <span class="text-danger email-text hide">* This email exists. Please try with another email</span>
                          </div>
                        </div>
                    </div>

                    <div class="row content_bar">
                        <label class="col-sm-3 col-form-label">Password</label>

                        <div class="col-sm-9">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" name="sign_pass" type="password" required="true">
                            </div>
                        </div>
                    </div>

                    <div class="row content_bar">
                        <label class="col-sm-3 col-form-label">Confirm Password</label>

                        <div class="col-sm-9">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" name="confirm_pass" type="password" required="true">
                            </div>
                            <span class="text-danger pass-text hide">* Confirm Password is invalid.</span>
                        </div>
                    </div>

                    <div class="row footer">
                        <div class="col-sm-6 col-md-offset-3">
                        	<a type="submit" id="signup_btn" class="btn btn-fill btn-info">Sign Up</a>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		reg_email = $('input[name="sign_email"]');

		$(function () {
			var r_check_url = "<?php echo base_url()?>login/check_reg_email";
			var reg_form_val = 0;
			reg_email.focusout(function() {
				var r_email = reg_email.val();
				console.log(r_email);
				$.ajax({
					url: r_check_url,
					data: {'email': r_email},
					type: 'POST',
					success: function(rpn) {
						if(parseInt(rpn) > 0) {
							$('.email-text').removeClass('hide');
							$('.email-text').addClass('show');
							reg_form_val = 1;
						}
						else {
							reg_form_val = 0;
							$('.email-text').removeClass('show');
							$('.email-text').addClass('hide');
						}
					}
				});
			});

			reg_email.focusin(function() {
				$('.email-text').removeClass('show');
				$('.email-text').addClass('hide');
			})

			$("#signup_btn").click(function() {
				var sign_pass = $("input[name='sign_pass']").val();
				var confirm_pass = $("input[name='confirm_pass']").val();
				if (sign_pass == confirm_pass) {
					$('#signup_form').submit();
				} else {
					$('.pass-text').removeClass('hide');
					$('.pass-text').addClass('show');
				}
			})

			$("input[name='sign_pass']").focusin(function() {
				$('.pass-text').removeClass('show');
				$('.pass-text').addClass('hide');
			})

			$("input[name='confirm_pass']").focusin(function() {
				$('.pass-text').removeClass('show');
				$('.pass-text').addClass('hide');
			})
		})
		
	</script>
</body>