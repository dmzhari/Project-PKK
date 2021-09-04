<?php
session_start();
include 'config/functions.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
	header('location: login.php');
	exit();
}

$query = query("SELECT * FROM tblogin");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex, nofollow">

	<!-- Bootstrap Css -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="../assets/css/all.min.css">

	<!-- Custom Css -->
	<link rel="stylesheet" href="../assets/css/style2.css?version=<?= filemtime('../assets/css/style2.css') ?>">

	<!-- Animate Css -->
	<link rel="stylesheet" href="../assets/css/animate.min.css">

	<!-- Favicon -->
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<title>Admin Dashboard</title>
</head>

<body>
	<?php include 'header.php' ?>

	<div class="col-md pt-3">
		<h3 class="text-center">Data Access Login</h3>
		<div class="table-responsive-md">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1 ?>
					<?php foreach ($query as $row) { ?>
						<tr>
							<td><?= $i ?></td>
							<td><?= $row['username'] ?></td>
						</tr>
						<?php $i++ ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	</div>

	<!-- Jquery Js -->
	<script src="../assets/js/jquery-3.6.0.js"></script>

	<!-- Bootstrap Js -->
	<script src="../assets/js/bootstrap.min.js"></script>

	<!-- Popper Js -->
	<script src="../assets/js/popper.min.js"></script>
</body>

</html>