<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<div class="container">
		<header>
			<?php include 'navigation.php'; ?>
			<h1>W :: <?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
			Copyright 2017...
		</footer>
	</div>

	<script src="<?= $this->assetUrl('js/jquery.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>" charset="utf-8"></script>
	<?= $this->section('main_script') ?>
</body>
</html>