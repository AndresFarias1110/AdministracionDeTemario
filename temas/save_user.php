<?php

$unidad = htmlspecialchars($_REQUEST['unidad']);
$subtema = htmlspecialchars($_REQUEST['subtema']);
$titulo = htmlspecialchars($_REQUEST['titulo']);

include 'conn.php';

$sql = "insert into subtemas values('$subtema', '$titulo', $unidad)";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'subtema' => $subtema,
		'titulo' => $titulo,
		'unidad' => $unidad
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>