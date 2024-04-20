<?php
	$host = "localhost";
	$user = "homemaster";
	$pass = "1234";
	$db = "homepage";

	$conn = new mysqli($host, $user, $pass, $db);

	if ($conn->connect_error) {
		die("연결실패: " . $conn->connect_error);
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			session_start();
			$_SESSION["username"] = $username;
			header("location: welcome.php");
		} else {
			$error = "아이디 또는 비밀번호가 잘못되었습니다.";
		}
	}
?>