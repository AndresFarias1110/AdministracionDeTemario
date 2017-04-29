<?php
include 'conn.php';

function subtemas($idTema, $con) {
	$query = 'select * from subtemas where unidad_id = ' . $idTema;
	$result = $con->query($query);
	$subtemas = [];
	while($data = mysqli_fetch_array($result)) {
		$subtemas[] = ['subtema' => $data['subtema'], 'titulo' => $data['titulo']];
	}
	return $subtemas;
}

function tieneSubTemas($id, $con) {
	$query = 'select * from subtemas where unidad_id = ' . $id;
	$result = $con->query($query);
	return count(mysqli_fetch_array($result)) > 0;
}

function obtenerSubSubtemas($idSubtema, $con) {
	$query = 'select * from subsubtemas where subtemas_subtema = ' . $idSubtema;
	$result = $con->query($query);
	$subtemas = [];
	while($data = mysqli_fetch_array($result)) {
		$subtemas[] = ['subsubtema' => $data['subsubtema'], 'titulo' => $data['titulo']];
	}
	return $subtemas;
}

$querySelect = "select * from unidades;" or die(mysql_error());
$resultSelect = $conn->query($querySelect);
$unidades = [];
while($data = mysqli_fetch_array($resultSelect)) { 
  $unidades[] = ['id' => $data["id"], 'tema' => $data["tema"]];
}

$idSubtema = 0;
$contSubtema = ['titulo' => 'Temas a mostrar', 'subsubtema' => '', 'subtemas_subtema' => ''];
if(isset($_GET['idSubtema'])) {
	$idSubtema = $_GET['idSubtema'];
	$contSubtema = obtenerSubSubtemas($idSubtema, $conn);
}
