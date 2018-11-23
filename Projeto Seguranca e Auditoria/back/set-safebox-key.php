<?php
	include "db_conn.php";
	include "AES.php";
	session_start();

	$sql =  "SELECT USER_KEY FROM TB_USERS WHERE EMAIL='".$_SESSION["EMAIL"]."'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = $result->fetch_assoc();
		$user_key = $row["USER_KEY"];
	} else {
		$user_key = "";
	}

	$new_key_name = $_REQUEST["key_name"];
	$new_key_password = $_REQUEST["key_password"];

	if($user_key != "") {
		$aes = new AES($new_key_password, $user_key, 128);
		$enc = $aes->encrypt();

		$sql_ist = "INSERT INTO TB_USERS_KEYS (ID, NAME, PASSWORD) VALUES ('".$_SESSION["ID"]."', '".$new_key_name."', '".$enc."')";

		if($conn->query($sql_ist) === TRUE) {
			$data = (object)array(
						"data" => (object)array(
									"message" => "New item added."
								),
						"code" => 200
					);

			$json = json_encode($data, JSON_UNESCAPED_UNICODE);
			echo $json;
		}
	}else {
		echo "erro";
	}
?>