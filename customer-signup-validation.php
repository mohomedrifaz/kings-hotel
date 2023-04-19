<?php
session_start();
include "db_conn.php";

if (
	isset($_POST['name']) && isset($_POST['password']) &&
	isset($_POST['repeat-password']) &&
	isset($_POST['email']) && isset($_POST['contact'])

) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$name = validate($_POST['name']);
	$password = validate($_POST['password']);

	$repeat_password = validate($_POST['repeat-password']);

	$email = validate($_POST['email']);
	$contact = validate($_POST['contact']);


	$user_data = 'name=' . $name;





	if (empty($name)) {
		header("Location: sign-up.php?error=Name is required&$user_data");
		exit();
	} else if (empty($password)) {
		header("Location: sign-up.php?error=Password is required&$user_data");
		exit();
	} else if (empty($repeat_password)) {
		header("Location: sign-up.php?error= Re Password is required&$user_data");
		exit();
	} else if (empty($contact)) {
		header("Location: sign-up.php?error=Contact is required&$user_data");
		exit();
	} else if (empty($email)) {
		header("Location: sign-up.php?error=Email is required&$user_data");
		exit();
	} else if ($password !== $repeat_password) {
		header("Location: sign-up.php?error=The confirmation password does not match&$user_data");
		exit();
	} else {

		//Hashing the password
		$password = md5($password);

		$sql = "SELECT * FROM customer_reg WHERE name='$name'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: sign-up.php?error=The Username is taken by another&$user_data");
			exit();
		} else {
			$sql2 = "insert into customer_reg(name,password,contact,email) values('$name','$password','$contact','$email')";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				header("Location: sign-up.php?success=Your account was created succesfully");
				exit();
			} else {
				header("Location: sign-up.php?error=Unknown error occured&$user_data");
				exit();
			}
		}
	}
} else {
	header("Location: sign-up.php");
	exit();
}