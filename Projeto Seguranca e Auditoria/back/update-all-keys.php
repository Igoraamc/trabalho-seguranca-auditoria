<?php
	include 'db_conn.php';
	include 'AES.php';

	//function updateAllUsersKey($old_master_key, $new_master_key){
		$keys_array = array();
		$dec_keys_array = array();
		$users_array = array();
		$passwords_array = array();
		$dec_password_array = array();
		$blockSize = 128;

		$sql = "SELECT * FROM TB_USERS";
		$result = $conn->query($sql);

		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$keys_array[] = $row["USER_KEY"];
				$users_array[] = $row["EMAIL"];
				$passwords_array[] = $row["PASSWORD"];
				$ids_array[] = $row["ID"];
		        echo $row["USER_KEY"] . '<br>' . $row["EMAIL"] . '<br>';
		    }
		}else {
			echo "no results <br>";
		}

		$sql_get = "SELECT * FROM TB_USERS_KEYS";
		$result_get = $conn->query($sql_get);

		if($result_get->num_rows > 0) {
			$j = 0;
			while($row = $result->fetch_assoc()){
				$test = new AES($row["PASSWORD"], $keys_array[$j], $blockSize);
				$dec_test = $test->decrypt();

				$j++;
				echo $row["ID"] ." and ". $row["NAME"] . " and ". $row["PASSWORD"] . "<br>";
			}
		}else {
			echo 'erro';
		}

		if(sizeof($keys_array) != 0) {
			for ($i = 0; $i < sizeof($keys_array); $i++) { 
				$aeskeys = new AES($keys_array[$i], $old_master_key, $blockSize);
				$dec_keys = $aeskeys->decrypt();

				$aespass = new AES($passwords_array[$i], $keys_array[$i], $blockSize);
				$dec_pass = $aespass->decrypt();

				$dec_password_array[] = $dec_pass;

				echo $keys_array[$i] ." and ". $dec_pass . "<br>";

				$aesnewkeys = new AES($dec_keys, $new_master_key, $blockSize);
				$enc_new_keys = $aesnewkeys->encrypt();

				$sql_updt = "UPDATE TB_USERS SET USER_KEY='".$enc_new_keys."' WHERE "
			}
		}

		echo sizeof($keys_array) .' - '. sizeof($users_array) .' - '. sizeof($passwords_array); 
	//}
?>