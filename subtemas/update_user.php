<?php

$tema = htmlspecialchars($_REQUEST['tema']);
$titulo = htmlspecialchars($_REQUEST['titulo']);
$subtema = htmlspecialchars($_REQUEST['subtema']);

include 'conn.php';

$sql = "update subsubtemas set titulo='$titulo' where subtemas_subtema='$tema'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'subtemas_subtema' => $tema,
		'subsubtema' => $subtema,
		'titulo' => $titulo
	));
} else {
	echo json_encode(array('errorMsg'=>'Error '. $sql));
}
?>