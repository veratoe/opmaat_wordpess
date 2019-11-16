<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

    	<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php wp_body_open(); ?>

    <body>
       <header class="fixed-top">
            <div class="navbar fixed-top navbar-light bg-light p-md-3 p-lg-5" id="opmaat_header">
                <div class="container">
                    <a class="d-block d-lg-none" data-toggle="collapse" href="#mobile_menu" role="button" aria-expanded="false" aria-controls="mobile_menu">
                        <img id="hamburger" src="<?= get_bloginfo('template_directory'); ?>/assets/images/hamburger.svg" width="20">
                        <img id="close" src="<?= get_bloginfo('template_directory'); ?>/assets/images/close.svg" width="20" style="display: none">
                    </a>
                    <a href="/"><img src="<?= get_bloginfo('template_directory'); ?>/assets/images/logo.png" id="logo"></a>
                    <span class="d-none d-lg-block" style="font-size: 2.5em;font-family: 'Amatic SC';font-weight: bold;color: #7b7b7b;">Start vandaag nog met begeleiding!</span>
                    <a href="tel:0736894388"><h3><img src="<?= get_bloginfo('template_directory'); ?>/assets/images/phone.svg" width="30" class="phone_icon">073-6894388</h3></a>
                </div>
                <div class="container d-none d-lg-block" style="position: relative;">
                        <ul id="menu">
                           	<?php wp_nav_menu( array('menu' => 'hoofdmenu')); ?>
						</ul>
                </div>
                <div class="collapse" id="mobile_menu">
                    <ul id="mobile_menu">
       					<?php wp_nav_menu( array('menu' => 'hoofdmenu')); ?>
	                </ul>
                </div>
                </div>
           <div>

    </header>









