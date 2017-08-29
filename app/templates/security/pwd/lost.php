<?php $this->layout('layout', [
	'title' => $title,
]) ?>


<?php $this->start('main_content') ?>

	<h2><?= $title ?></h2>

	<div class="row">

		<div class="col-md-4 col-md-offset-4">

			<?php if ( !empty($error) ) : ?>
				<div class="alert alert-danger">
					<?= $error ?>
				</div>
			<?php endif; ?>

			<form action="<?= $this->url('security_lost_pwd') ?>" method="post">

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="email">
				</div>

				<button type="submit" class="btn btn-default">Submit</button>
			</form>

		</div> <!-- Fin de Col-md-4 -->

	</div> <!-- Fin de Row -->

<?php $this->stop('main_content') ?>