<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Page View</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style type="text/css">
		.container {
			margin: 20px;
		}
	</style>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<div class='col-sm-10'>
				<h2>Welcome <?=  $this->session->userdata['user_info']['first_name']  ?>!</h3>
			</div>
			<div class='col-sm-2'>
				<h3><a href="/login_regis/logoff">Log Off</a></h3>
			</div>
		</div>
		
		<div class='panel panel-default'>
			<div class='panel-body'>
				<h3>User Information</h3>
				<p>First Name:  <?=  $this->session->userdata['user_info']['first_name']  ?></p>
				<p>Last Name:  <?=  $this->session->userdata['user_info']['last_name']  ?></p>
				<p>Email Address:  <?=  $this->session->userdata['user_info']['email']  ?></p>
			</div>
		</div>
	</div>
</html>