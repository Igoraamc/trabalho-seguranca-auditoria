<?php
	include 'db_conn.php';
	//include 'random_key.php';

	date_default_timezone_set('America/Bahia');

	$admin_key = "No key";

	$email = "A_D_M_I_N@admin.admin";
	$user = "ADMIN";
	$today = new DateTime();
	$format = $today->format('d/m/Y');

	$sql =  "SELECT DATA_EXP, USER_KEY FROM TB_ADMIN WHERE EMAIL='".$email."' AND NAME='".$user."'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = $result->fetch_assoc();
		$admin_key_exp = $row["DATA_EXP"];
		$act_admin_key = $row["USER_KEY"];
	}

	if($format >= $admin_key_exp) {
		$new_admin_key = randString();
		$today->modify('+1 day');
		$format = $today->format('d/m/Y');
		$sql_update = "UPDATE TB_ADMIN SET USER_KEY='".$new_admin_key."', DATA_EXP='".$format."' WHERE NAME='".$user."'";
		$conn->query($sql_update);
	}

	$sql_key =  "SELECT USER_KEY FROM TB_ADMIN WHERE EMAIL='".$email."' AND NAME='".$user."'";

	$new_result = mysqli_query($conn, $sql_key);

	if (mysqli_num_rows($new_result) > 0) {
		$row = $new_result->fetch_assoc();
		$admin_key = $row["USER_KEY"];
	}

	echo $admin_key;
?>