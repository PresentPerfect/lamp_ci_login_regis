<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login_page</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style type="text/css">
		.container {
			margin: 20px;
		}
		.panel {
			border: 1px solid gray;
		}
		.error_msg {
			color: red;
		}
	</style>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<div class='col-sm-6'>
				<div class='panel panel-default'>
					<div class='panel-body'>
						<h2>Log In</h2>
<?php   				if ($this->session->flashdata('login_error_msg'))
						{
?>							<div class='error_msg'>
<?=   							$this->session->flashdata('login_error_msg');
?>								
							</div>
<?php					}
?>						
						<div class='form'>
							<form role='form' action='/login_regis/login' method='post'>
								<div class='form-group'>
									<label for='email'>Email:  </label>
									<input class='form-control' type='email' name='email'>
								</div>
								<div class='form-group'>
									<label for='password'>Password:  </label>
									<input class='form-control' type='password' name='password'>
								</div>
								<button class='btn btn-primary' type='submit'>Login</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class='col-sm-6'>
				<div class='panel panel-default'>
					<div class='panel-body'>
						<h2>Registration</h2>
<?php   				if ($this->session->flashdata('regis_error_msg'))
						{
?>							<div class='error_msg'>
<?=   							$this->session->flashdata('regis_error_msg');
?>								
							</div>
<?php					}
?>
						<div class='form'>
							<form role='form' action='/login_regis/regis' method='post'>
								<div class='form-group'>
									<label for='first_name'>First Name:  </label>
									<input class='form-control' type='text' name='first_name'>
								</div>
								<div class='form-group'>
									<label for='last_name'>Last Name:  </label>
									<input class='form-control' type='text' name='last_name'>
								</div>
								<div class='form-group'>
									<label for='email'>Email Address:  </label>
									<input class='form-control' type='email' name='email'>
								</div>
								<div class='form-group'>
									<label for='password'>Password:  </label>
									<input class='form-control' type='password' name='password'>
								</div>
								<div class='form-group'>
									<label for='password_confirm'>Confirm Password:  </label>
									<input class='form-control' type='password' name='password_confirm'>
								</div>
								<button class='btn btn-primary' type='submit'>Register</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>