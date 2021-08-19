<?php
error_reporting(0);

// Koneksi Ke Database
$con = mysqli_connect('localhost', 'root', '', 'dbapp');

function query($query)
{
	global $con;
	$result = mysqli_query($con, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

if (!$con) {
	die('Database Connect Error : ' . mysqli_connect_error());
}
