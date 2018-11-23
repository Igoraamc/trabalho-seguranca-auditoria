<?php
	include 'db_conn.php';
	include 'AES.php';

	//function updateAllUsersKey($old_master_key, $new_master_key){
		$keys_array = array();
		$users_array = array();
		$passwords_array = array();
		$blockSize = 128;

		$sql = "SELECT * FROM TB_USERS";
		$result = $conn->query($sql);

		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$keys_array[] = $row["USER_KEY"];
				$users_array[] = $row["EMAIL"];
				$passwords_array[] = $row["PASSWORD"];
		        echo $row["USER_KEY"] . '<br>' . $row["EMAIL"] . '<br>';
		    }
		}else {
			echo "no results <br>";
		}

		if(sizeof($keys_array) != 0) {
			for ($i = 0; $i < sizeof($keys_array); $i++) { 
				$aeskey = new AES($passwords_array[$i], $keys_array[$i], $blockSize);
				$dec_key = $aeskey->decrypt();

				echo $keys_array[$i] ." and ". $dec_key . "<br>";
			}
		}

		echo sizeof($keys_array) .' - '. sizeof($users_array) .' - '. sizeof($passwords_array); 
	//}
?>