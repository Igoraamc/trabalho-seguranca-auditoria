<?php
	include 'db_conn.php';
	include 'AES.php';
	session_start();

	$email = $_POST["lemail"];
	$password = $_POST["lpassword"];
	$blockSize = 128;

	$sql_key =  "SELECT USER_KEY FROM TB_USERS WHERE EMAIL='".$email."'";

	$result_key = mysqli_query($conn, $sql_key);

	if (mysqli_num_rows($result_key) > 0) {
		$row_key = $result_key->fetch_assoc();
		$user_key = $row_key["USER_KEY"];
	} else {
		$user_key = "";
	}

	$aes = new AES($password, $user_key, $blockSize);
	$enc = $aes->encrypt();

	$sql = "SELECT * FROM TB_USERS WHERE EMAIL='".$email."' AND PASSWORD='".$enc."'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = $result->fetch_assoc();
		$data = (object)array(
					"data" => (object)array(
								"name" => $row["NAME"],
								"email" => $row["EMAIL"]
							),
					"code" => 200
				);
		$json = json_encode($data, JSON_UNESCAPED_UNICODE);

		$_SESSION["LOGIN"] = true;
		$_SESSION["ID"] = $row["ID"];
		$_SESSION["NAME"] = $row["NAME"];
		$_SESSION["EMAIL"] = $row["EMAIL"];
		echo $json;
	}else {
		$data = (object)array(
					"data" => (object)array(
								"message" => "Incorrect password."
							),
					"password" => $password,
					"enc" => $enc,
					"code" => 0
				);
		$json = json_encode($data, JSON_UNESCAPED_UNICODE);
		echo $json;
	}
?>