<?php

$id = intval($_REQUEST['id']);
$firstname = htmlspecialchars($_REQUEST['tema']);

include 'conn.php';

$sql = "update unidades set tema='$firstname' where id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		'firstname' => $firstname
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>