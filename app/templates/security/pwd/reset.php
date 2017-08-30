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

			<form action="<?= $this->url('security_reset_pwd', ["token" => $token]) ?>" method="post">

                <input type="token" name="token" value="<?= $token ?>">

				<div class="form-group">
					<label for="password">Nouveau Mot de passe</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Nouveau Mot de passe">
				</div>

                <div class="form-group">
					<label for="repeat_password">Répéter le Nouveau Mot de passe</label>
					<input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder="Répéter le Nouveau Mot de passe">
				</div>

				<button type="submit" class="btn btn-default">Submit</button>
			</form>

		</div> <!-- Fin de Col-md-4 -->

	</div> <!-- Fin de Row -->

<?php $this->stop('main_content') ?>