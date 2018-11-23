<?php
	include 'db_conn.php';

	$email = $_REQUEST["email"];

	$sql =  "SELECT USER_KEY FROM TB_USERS WHERE EMAIL='".$email."'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = $result->fetch_assoc();
		$user_key = $row["USER_KEY"];
		echo $user_key;
	} else {
		$user_key = "";
		echo "No key";
	}

	mysqli_close($conn);
?>