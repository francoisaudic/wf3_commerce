<?php $this->layout('layout', ['title' => 'Contact']) ?>

<?php $this->start('main_content') ?>
	<form method="post">

        <div>
            <label for="name">Votre Nom</label>
            <input type="text" id="name" name="name" value="<?= $name ?>">
        </div>

        <div>
            <label for="email">Votre Email</label>
            <input type="email" id="email" name="email" value="<?= $email ?>">
        </div>

        <div>
            <label for="message">Votre Message</label>
            <textarea id="message" name="message" rows="8" cols="80"><?= $message ?></textarea>
        </div>

        <button type="submit" name="button">Envoi</button>

    </form>
<?php $this->stop('main_content') ?>
