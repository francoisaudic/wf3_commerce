<?php $this->layout('layout', [
	'title' => $title
]) ?>


<?php $this->start('main_content') ?>

	<h2><?= $title ?></h2>
	
	<dl>
		<dt>Nom</dt>
		<dd><?= $name ?></dd>

		<dt>Description</dt>
		<dd><?= $description ?></dd>

		<dt>Image</dt>
		<dd><?= $image ?></dd>

		<dt>Prix</dt>
		<dd><?= $price ?></dd>
	</dl>

	<nav>
		<a href="<?= $this->url('product_update', ['id' => $id]) ?>">Modifier le produit</a>
		<a href="<?= $this->url('product_delete', ['id' => $id]) ?>">Supprimer le produit</a>
	</nav>

<?php $this->stop('main_content') ?>