<?php
	
	$w_routes = array(

		/* 
			Homepage
		*/
		['GET', '/', 'Default#home', 'home'],

		/* 
			Contact
		*/
		['GET|POST', '/contactez-nous', 'Default#contact', 'contact'],

		/* 
			Products
		*/
		['GET', '/products', 'Products#index', 'products_index'],
		['GET|POST', '/product/create', 'Products#create', 'product_create'],
		['GET', '/product/[i:id]', 'Products#read', 'product_read'],
		['GET|POST', '/product/[i:id]/update', 'Products#update', 'product_update'],
		['GET|POST', '/product/[i:id]/delete', 'Products#delete', 'product_delete'],

		/* 
			Users
		*/
		['GET', '/profile', 'Users#index', 'profile'],
		

		/* 
			Security
		*/
		['GET|POST', '/signin', 'Security#signin', 'security_signin'], // Identification
		['GET|POST', '/signup', 'Security#signup', 'security_signup'],// Enregistrement
		['GET', '/logout', 'Security#logout', 'security_logout'], // Déconnexion
		['GET|POST', '/lost-password', 'Security#lostPwd', 'security_lost_pwd'],
		['GET|POST', '/reset-password', 'Security#resetPwd', 'security_reset_pwd'],

	);