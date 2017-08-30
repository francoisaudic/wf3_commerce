<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_script') ?>
	<script type="text/javascript">
		$(document).ready(function(){

			setTimeout(AjaxCalling, 3000);
				
		});

		function AjaxCalling()
		{
			// On charge l'adresse /ajax/products
			$.ajax('<?= $this->url('product_ajax_index') ?>', {
				type: 'GET',
				success: function(response){
					// console.log(response);
					sendToHTML(response);
				}
			});
		}

		function sendToHTML(data)
		{
			// console.log(data);
			$.each(data, function (key, value){
				// console.log(key, value.name);
				$('#products_async').append('<li>'+value.name+'</li>');
			});
		}
	</script>
<?php $this->stop('main_script') ?>


<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-md-6">
		<h2>Liste des produits (Synchrone)</h2>

		<ul id="products_sync">

			<?php foreach ($products as $product) : ?>
				<li><?= $product['name'] ?></li>
			<?php endforeach; ?>

		</ul>
	</div>

	<div class="col-md-6">
		<h2>Liste des produits (aSynchrone)</h2>

		<ul id="products_async">
		</ul>
	</div>
</div>

<?php $this->stop('main_content') ?>