<?php $this->layout('layout', [
	'title' => 'Liste des Produits'
]) ?>




<?php $this->start('main_content') ?>

	<br/> <a href="<?= $this->url('product_create') ?>"> Ajouter Un Produit </a> <br/>

	<h2> Liste des Produits </h2>

	<?php foreach ($products as $product) : ?>
		<?= $product['title'] . ' : ' . $product['content'] ?> <br>
	<?php endforeach; ?>

<?php $this->stop('main_content') ?>