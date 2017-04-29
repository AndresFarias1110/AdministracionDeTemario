<?php

$lastname = htmlspecialchars($_REQUEST['tema']);

include 'conn.php';

$sql = "insert into unidades(tema) values('$lastname')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id' => mysql_insert_id(),
		'tema' => $lastname
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>