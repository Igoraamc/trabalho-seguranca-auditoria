<?php
	include 'db_conn.php';
	include 'AES.php';
	include 'random_key.php';
	include 'take-admin-user-key.php';

	$username = $_POST["name"];
	$email = $_POST["cemail"];
	$password_key = randString();
	$password = $_POST["cpassword"];
	$blockSize = 128;

	if($admin_key != "") {
		$aes = new AES($password, $password_key, $blockSize);
		$enc = $aes->encrypt();

		$sql = "INSERT INTO TB_USERS (NAME, EMAIL, PASSWORD, USER_KEY) VALUES ('".$username."', '".$email."', '".$enc."', '".$password_key."')";

		if($conn->query($sql) === TRUE) {
			$data = (object)array(
						"data" => (object)array(
									"message" => "User registered."
								),
						"user_key" => $enc,
						"password_key" => $password_key,
						"code" => 200
					);

			$json = json_encode($data, JSON_UNESCAPED_UNICODE);
			echo $json;
		}else {
			$data = (object)array(
						"data" => (object)array(
									"message" => "Something went wrong."
								),
						"code" => 0
					);

			$json = json_encode($data, JSON_UNESCAPED_UNICODE);
			echo $json;
		}
	}else {
		echo "Error in admin key";
	}
?>