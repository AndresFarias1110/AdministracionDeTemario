<?php

$id = intval($_REQUEST['id']);
$titulo = htmlspecialchars($_REQUEST['titulo']);
$subtema = htmlspecialchars($_REQUEST['subtema']);
$id_subtema = htmlspecialchars($_REQUEST['id_subtema']);

include 'conn.php';

$sql = "update subtemas set subtema='$subtema', titulo='$titulo' where subtema='$id_subtema'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'subtema' => $subtema,
		'titulo' => $titulo
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>