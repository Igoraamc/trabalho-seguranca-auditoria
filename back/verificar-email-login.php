<?php
	include 'db_conn.php';
	header('Content-type: application/json');

	$email = $_REQUEST["email"];

	$sql =  "SELECT EMAIL FROM TB_USER WHERE EMAIL='".$email."'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$data = (object)array(
					"message" => "Usuário existente",
					"code" => 200
				);
		$json = json_encode($data, JSON_UNESCAPED_UNICODE);
		echo $json;
	} else {
		$data = (object)array(
					"message" => "Usuário não cadastrado",
					"code" => 0
				);
		$json = json_encode($data, JSON_UNESCAPED_UNICODE);
	    echo $json;
	}

	mysqli_close($conn);
?>