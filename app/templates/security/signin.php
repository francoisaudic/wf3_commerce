<?php $this->layout('layout', [
	'title' => $title,
]) ?>


<?php $this->start('main_content') ?>

	<h2><?= $title ?></h2>

<?php $this->stop('main_content') ?>