<?php
	include 'db_conn.php';
	session_start();

	$keys_array = array();
	$users_array = array();
	$passwords_array = array();
	$blockSize = 128;

	$sql = "SELECT * FROM TB_USERS_KEYS WHERE ID='".$_SESSION["ID"]."'";
	$result = $conn->query($sql);

	$json_ar = array();

	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$keys_array[] = $row["NAME"];
			$passwords_array[] = $row["PASSWORD"];
	        echo $row["NAME"] . '<br>' . $row["PASSWORD"] . '<br>';

	        $json_ar[] = (object)array(
								"name" => $row["NAME"],
								"password" => $row["PASSWORD"]
							);
	    }
	    $json = json_encode($json_ar, JSON_UNESCAPED_UNICODE);
		echo $json;
	}else {
		$json = json_encode($json_ar, JSON_UNESCAPED_UNICODE);
		echo $json;
	}

	/*if(sizeof($keys_array) != 0) {
		for ($i = 0; $i < sizeof($keys_array); $i++) { 
			$aeskey = new AES($passwords_array[$i], $keys_array[$i], $blockSize);
			$dec_key = $aeskey->decrypt();
		}
	}

	echo sizeof($keys_array) .' - '. sizeof($users_array) .' - '. sizeof($passwords_array);*/
?>