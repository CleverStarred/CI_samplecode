<style type="text/css">
	.card-avatar {
		margin: auto !important;
	}
	.card-profile {
		margin-top: 20px !important;
		padding-top: 10px !important;
	}
	.side-content {
		padding-top: 10px;
	}
	.user {
		font-size: 18px;
		padding: 8px;
	}
	.logout {
		margin-top: 40px;
	}
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-8">
					<h2 class="header">Dashboard</h2>
				</div>
				<div class="col-md-4 text-right">
					<a class="btn btn-primary btn-round logout" href="<?php echo base_url()?>login/logout">Log Out</a>
				</div>
			</div>
			<div class="col-md-8">
				<?php if (isset($contents->message)): ?>
					<span class="text-danger" style="font-size: 25px"><?php echo $contents->message ?></span>
				<?php else: ?>
					<?php foreach ($contents as $key => $content) { ?>
						<div class="card card-profile">
							<div class="col-md-3">
								<div class="card-avatar">
					                <img class="img" src="<?php echo $content->author->avatar_url; ?>">
					            </div>
					        </div>
					        <div class="col-md-9 side-content text-left">
					        	<p> Sha: <b><?php echo $content->sha ?></b></p>
					        	<p> Author: <b><?php echo $content->author->login ?></b></p>
					        	<div><p> Message:</p></div><p> <b><?php echo $content->commit->message ?></b></p>
					        	<p> Date: <b><?php echo $content->commit->author->date ?></b></p>
					        </div>
				        </div>
					<?php } ?>
				<?php endif; ?>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-content">
						<h3> User List </h3>
						<?php foreach ($users as $key => $user) { ?>
							<div class="user"><?php echo $user['email']?></div>	
						<?php } ?>
					</div>
				</div>	
			</div>
		</div>
	</div>

</body>