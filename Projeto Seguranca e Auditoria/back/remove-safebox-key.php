<?php
	include "db_conn.php";
	include "AES.php";
	session_start();

	$new_key_name = $_REQUEST["key_name"];

	$sql_dlt = "DELETE FROM TB_USERS_KEYS WHERE NAME='".$new_key_name."'";

	if($conn->query($sql_dlt) === TRUE) {
		$data = (object)array(
					"data" => (object)array(
								"message" => "Item deleted."
							),
					"code" => 200
				);

		$json = json_encode($data, JSON_UNESCAPED_UNICODE);
		echo $json;
	}else {
		$data = (object)array(
					"data" => (object)array(
								"message" => "Item not found."
							),
					"code" => 0
				);

		$json = json_encode($data, JSON_UNESCAPED_UNICODE);
		echo $json;
	}
?>