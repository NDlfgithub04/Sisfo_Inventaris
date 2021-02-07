<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<title>Login - Sistem Inventaris Kantor</title>

	<!-- Favicons -->
	<link href="img/bps.png" rel="icon">
	<link href="img/bps.png" rel="icon">

	<!-- Bootstrap core CSS -->
	<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!--external css-->
	<link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style-responsive.css" rel="stylesheet">

	<!-- *********************************************************
		Template Name: Dashio
		Template URL : https://templatemag.com/dashio-bootstrap-admin-template/
		Author: TemplateMag.com
		License: https://templatemag.com/license/
	********************************************************** -->
</head>

<body>
	<!-- ***********************************************************************************************************************
		MAIN CONTENT
		************************************************************************************************************************** -->	
	
	<div id="login-page">
		<div class="container">
			<center><h2>Sistem Informasi Inventaris Kantor<br>BPS Kota Payakumbuh</h2><br>
			<img src="img/bps.png" width="100"></center>
			<form class="form-login" method="post" action="cekLogin.php">
				<h2 class="form-login-heading">LOGIN</h2><br>
				<div class="login-wrap">
					<input type="text" class="form-control" name="username" placeholder="Username" autofocus>
					<br>
					<input type="password" class="form-control" name="password" placeholder="Password">
					<br>
					<button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
					<hr>
				</div>
			</form>
		</div>
	</div>
	<!-- js placed at the end of the document so the pages load faster -->
	<script src="lib/jquery/jquery.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<!--BACKSTRETCH-->
	<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
	<script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
	<script>
		$.backstretch("img/com.jpg", {speed: 500
		});
	</script>
</body>
</html>