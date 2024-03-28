<?php
// Inclure le fichier de connexion à la base de données
include 'connexionBdd.php';

// Exécuter la requête SQL pour récupérer le nom de la scène avec onOff=1
try {
	$query = "SELECT nom FROM `scene` WHERE onOff = 1";
	$stmt = $pdo->query($query);
	$onOff = $stmt->fetchColumn();
} catch (PDOException $e) {
	echo "Erreur : " . $e->getMessage();
}

// Exécuter la requête SQL pour récupérer les données des scènes
try {
	$query = "SELECT nom FROM `scene` WHERE onOff != 1";
	$stmt = $pdo->query($query);
	$scenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>CodePen - Drag and Drop Tasks</title>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="./style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
	<!-- partial:index.partial.html -->
	<!-- JJ -->
	<div id="page">
		<div id="workarea">
			<h1>Stream deck</h1>
			<div id="users" class="user-panels">
				<div id="user-1" class="user-panel">
					<h4 class="user-name">Scène activée</h4>
					<div class="toolbar">
						<a href="#" class="add-task icon icon-plus"></a>
					</div>
					<div class="task-list">
						<div id="task-1" class="task">
							<p>
								<?php echo $onOff ?>
							</p>
							<div class="actions">
								<a href="#" class="icon-caret-right"></a>
								<a href="#" class="icon-ok"></a>
								<a href="#" class="icon-pencil"></a>
								<a href="#" class="icon-trash"></a>
							</div>
						</div>
					</div>
				</div>


				<div id="user-2" class="user-panel">
					<h4 class="user-name">Vos scènes</h4>
					<div class="toolbar">
						<a href="#" class="add-task icon icon-plus"></a>
					</div>
					<div class="task-list">

						<?php
						// Générer dynamiquement les tâches dans le HTML
						foreach ($scenes as $scene) {
							?>

							<div id="task-2" class="task">
								<p>
									<?php echo $scene['nom'] ?>
								</p>
								<div class="actions">
									<a href="#" class="icon-caret-right"></a>
									<a href="#" class="icon-ok"></a>
									<a href="#" class="icon-pencil"></a>
									<a href="#" class="icon-trash"></a>
								</div>
							</div>

						<?php } ?>

					</div>
				</div>
			</div><!-- #users -->

		</div><!-- #workarea -->
	</div><!-- #page -->
	<!-- SDG -->
	<!-- partial -->
	<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="./script.js"></script>

</body>

</html>