<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="<?= base_url(); ?>assets/app/common.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h4 class="border-bottom">Login</h4>
					<form action="auth/request-login" id="myform" method="post">
						<div class="form-group">
							<label for="Email ID">Email ID</label>
							<input type="email" class="form-control" name="emailid" id="emailid">
						</div>
						<div class="form-group">
							<label for="Email ID">Password</label>
							<input type="password" class="form-control" name="password" id="password">
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
						<div>
							<p>Not register ? <a href="<?= site_url('auth/register'); ?>">Register</a></p>
							<p>Forgot your password ? <a href="<?= site_url('auth/forgot-password'); ?>">Reset password</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
