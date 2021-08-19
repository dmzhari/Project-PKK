<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Login Admin">
	<meta name="robots" content="nofollow, noindex">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/animate.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<title>Login Admin</title>
</head>

<body>
	<div class="svg-top">
		<svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
			<path d="M0.00,49.98 C149.99,150.00 271.49,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: rgb(160, 199, 233);"></path>
		</svg>
	</div>
	<div class="container">
		<div class="row login">
			<div class="col-sm-12">
				<div class="card border-0">
					<div class="animate__animated animate__fadeInUp">
						<div class="col-sm-6 offset-sm-3 card-header text-center font-weight-bold">
							Administrator Login
						</div>
					</div>
					<div class="col-sm-4 offset-sm-4 card-body">
						<div class="needs-validation animate__animated animate__fadeInUp" novalidate>
							<div class="form-group">
								<div class="input-group is-invalid">
									<div class="input-group-prepend">
										<label class="input-group-text bg-transparent" for="user">
											<i class="fas fa-user"></i>
										</label>
									</div>
									<input type="text" name="user" id="user" class="bg-transparent font-weight-bold form-control" placeholder="username" required>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group is-invalid">
									<div class="input-group-prepend">
										<label class="input-group-text bg-transparent" for="pass">
											<i class="fas fa-key"></i>
										</label>
									</div>
									<input type="password" name="pass" id="pass" class="bg-transparent font-weight-bold form-control" placeholder="password" required>
								</div>
							</div>
							<button class="btn btn-dark form-control">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="svg-bottom">
		<svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
			<path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgb(160, 199, 233);"></path>
		</svg>
	</div>
	<script src="../assets/js/sweetalert2.all.min.js"></script>
	<script src="../assets/js/jquery-3.6.0.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/login.js"></script>
</body>

</html>