<?php include 'app.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
	
	<script type="text/javascript" src="./jquery.min.js"></script>
	
</head>
<body>
	<div class="container clearfix" style="margin-top: 20px;">
		<ul class="nav nav-pills">
			<li role="presentation" class="active"><a href="#">Inicio</a></li>
			<li role="presentation"><a href="./unidades/index.html">Unidades</a></li>
			<li role="presentation"><a href="./temas/index.php">Temas</a></li>
			<li role="presentation"><a href="./subtemas/index.php">SubTemas</a></li>
		</ul>
	</div>
	<div class="container clearfix" style="margin-top: 20px;">
		<div class="col-md-6 col-sm-6">
			<div class="panel panel-default panel-body">
				<ul>
					<?php foreach($unidades as $key => $unidad): ?>
					<li>
						<strong>Unidad <?= $key + 1 ?>:</strong>
						<?= $unidad['tema'] ?>
						<?php if(tieneSubTemas($unidad['id'], $conn)): ?>
							<ul>
								<?php $subtemas = subtemas($unidad['id'], $conn); ?>
								<?php foreach($subtemas as $sub): ?>
									<li>
										<strong><?= $sub['subtema'] ?>:</strong>
										<a href="./?idSubtema=<?= $sub['subtema'] ?>">
											<?= $sub['titulo'] ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="col-md-6 col-sm-6">
			<div class="panel panel-default panel-body">
				<?php foreach($contSubtema as $subt): ?>
					<?= isset($subt['titulo']) ? $subt['subsubtema'] . " " . $subt['titulo'] : '' ?> <br />
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</body>
</html>