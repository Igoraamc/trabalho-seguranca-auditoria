<?php
	include 'db_conn.php';
	include 'AES.php';
	session_start();

	$sql =  "SELECT USER_KEY FROM TB_USERS WHERE EMAIL='".$_SESSION["EMAIL"]."'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = $result->fetch_assoc();
		$user_key = $row["USER_KEY"];
	} else {
		$user_key = "";
	}
	$blockSize = 128;

	$sql = "SELECT * FROM TB_USERS_KEYS WHERE ID='".$_SESSION["ID"]."'";
	$result = $conn->query($sql);

	$json_ar = array();

	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$aeskey = new AES($row["PASSWORD"], $user_key, $blockSize);
			$dec_key = $aeskey->decrypt();
	        $json_ar[] = (object)array(
								"name" => $row["NAME"],
								"password" => $dec_key
							);
	    }
	    $final_json = (object)array(
								"data" => $json_ar,
								"total" => sizeof($json_ar)
							);
	    $json = json_encode($final_json, JSON_UNESCAPED_UNICODE);
		echo $json;
	}else {
		$json = json_encode($json_ar, JSON_UNESCAPED_UNICODE);
		echo $json;
	}
?>