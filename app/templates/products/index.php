<?php $this->layout('layout', [
	'title' => $title,
]) ?>


<?php $this->start('main_content') ?>

	<h2><?= $title ?></h2>

	<?php if ( count($products) ) : ?>
		<?php foreach ($products as $product) : ?>
			<div>
				<a href="<?= $this->url('product_read', ['id' => $product['id']]) ?>"><?= $product['name'] ?></a>
			</div>
		<?php endforeach; ?>

	<?php else : ?>
		<p>Il n'y aucun produit dans la BDD.</p>
		<a href="<?= $this->url('product_create') ?>">Ajouter un Produit</a>

	<?php endif; ?>

<?php $this->stop('main_content') ?>