<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET|POST', '/contactez-nous', 'Default#contact', 'contact'],

		['GET', '/products', 'Products#index', 'products_index'],
		['GET|POST', '/product/create', 'Products#create', 'product_create'],
		['GET', '/product/[i:id]', 'Products#read', 'product_read'],
		['GET|POST', '/product/[i:id]/update', 'Products#update', 'product_update'],
		['GET|POST', '/product/[i:id]/delete', 'Products#delete', 'product_delete'],

	);