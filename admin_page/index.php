<?php
session_start();
include '../config/functions.php';
include 'csrf-protect.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
	header('location: login.php');
	exit();
}

$query 	= query("SELECT * FROM tblogin");
$link	= query("SELECT * FROM tbpengaturan");
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

	<!-- Datatables CSS -->
	<link rel="stylesheet" href="../assets/datatables/css/dataTables.bootstrap4.min.css">

	<!-- Favicon -->
	<link rel="shortcut icon" href="../<?= $link[0]['icon'] ?>" type="image/x-icon">
	<title>Admin Dashboard</title>
</head>

<body>
	<?php include 'header.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-md-9 p-3 px-md-4 mr-auto offset-md-3">
				<div class="card">
					<h4 class="text-center card-header">Data Access Login</h4>
					<div class="d-flex justify-content-between text-center pt-2 card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover data">
								<thead>
									<tr>
										<th>No</th>
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
				<input type="hidden" id="csrf" value="<?= csrf_token() ?>">
				<div class="form-group d-flex mt-2">
					<button class="btn btn-primary flex-fill mr-2" data-toggle="modal" data-target="#tambahadmin">
						Tambah Data Admin
					</button>
					<button class="btn btn-danger flex-fill" data-toggle="modal" data-target="#deleteadmin">Hapus Admin</button>
				</div>

				<!-- Modal Delete Admin -->
				<div class="modal fade" id="deleteadmin" tabindex="-1" aria-labelledby="deleteadmin" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Hapus Admin</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<p class="text-center">Pilih User Admin Yang Ingin Di Hapus</p>
									<select class="custom-select" id="userdelete">
										<?php foreach ($query as $username) { ?>
											<option value="<?= $username['id'] ?>"><?= $username['username'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary" id="hapusdata">Submit</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Modal Delete Admin -->

				<!-- Modal Add Admin -->
				<div class="modal fade" id="tambahadmin" tabindex="-1" aria-labelledby="tambahadmin" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Admin</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<div class="input-group is-invalid">
										<div class="input-group-prepend">
											<label class="input-group-text bg-transparent" for="username">
												<i class="fas fa-user"></i>
											</label>
										</div>
										<input class="form-control" type="text" id="username" placeholder="Username">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group is-invalid">
										<div class="input-group-prepend">
											<label class="input-group-text bg-transparent" for="password">
												<i class="fas fa-key"></i>
											</label>
										</div>
										<input class="form-control" type="password" type="text" id="password" placeholder="Password">
										<div class="input-group-append">
											<button class="btn fas fa-eye input-group-text bg-transparent" id="showpass"></i></button>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary" id="tambahdata">Submit</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Modal Add Admin -->

			</div>
		</div>
	</div>

	<!-- Jquery Js -->
	<script src="../assets/js/jquery-3.6.0.js"></script>

	<!-- Bootstrap Js -->
	<script src="../assets/js/bootstrap.min.js"></script>

	<!-- Sweet2Alert Js -->
	<script src="../assets/js/sweetalert2.all.min.js"></script>

	<!-- DataTables Js -->
	<script src="../assets/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../assets/datatables/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$(document).ready(function() {

			$('#showpass').click(function(e) {
				if ($(this).hasClass('fas fa-eye')) {
					$('#password').attr('type', 'text');
					$(this).removeClass('fas fa-eye');
					$(this).addClass('fas fa-eye-slash');
				} else if ($(this).hasClass('fas fa-eye-slash')) {
					$('#password').attr('type', 'password');
					$(this).removeClass('fas fa-eye-slash');
					$(this).addClass('fas fa-eye')
				}
			});

			$('.data').DataTable({
				language: {
					search: "_INPUT_",
					searchPlaceholder: "Search..."
				},
				pageLength: 5,
				lengthMenu: [
					[5, 10, 20],
					[5, 10, 20]
				]
			})
		});

		let csrf = $('#csrf').val();

		$('#hapusdata').click(function() {
			let id = $('#userdelete').val();

			$.ajax({
				url: 'admin_user.php',
				type: 'POST',
				data: {
					"deleteadmin": '',
					"id": id,
					"csrf": csrf
				},
				success: function(respone) {
					if (respone == 'success') {
						swal.fire({
							icon: 'success',
							title: 'Data Berhasil Di Hapus'
						}).then((result) => {
							if (result.isConfirmed) {
								window.location.reload();
							}
						});
					}
				}
			});
		});

		$('#tambahdata').click(function() {
			let username = $('#username').val();
			let password = $('#password').val();

			if (username == '' || password == '') {
				swal.fire({
					icon: 'warning',
					title: 'Data Tidak Boleh Ada Yang Kosong'
				});
			} else {
				$.ajax({
					url: 'admin_user.php',
					type: 'POST',
					data: {
						"username": username,
						"password": password,
						"csrf": csrf
					},
					success: function(respone) {
						if (respone == 'success') {
							swal.fire({
								icon: 'success',
								title: 'Data Berhasil Di Tambah'
							}).then((result) => {
								if (result.isConfirmed) {
									window.location.reload();
								}
							});
						}
					}
				});
			}
		});
	</script>
</body>

</html>