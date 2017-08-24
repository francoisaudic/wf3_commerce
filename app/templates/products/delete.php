<?php $this->layout('layout', [
	'title' => $title,
]) ?>


<?php $this->start('main_content') ?>

	<h2><?= $title ?></h2>

	<p>Voulez vous supprimer l'article <?= $product['name'] ?></p>

	<form method="post">
		<button type="submit">Oui</button>
		<a href="<?= $this->url('product_read', ['id' => $product['id']]) ?>">Non</a>
	</form>

<?php $this->stop('main_content') ?>