<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      <?php wp_title('-', true, 'right'); ?>
	  	<?php bloginfo('name'); ?>
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap"
      rel="stylesheet"
    />
    <?php wp_head(); ?>
  </head>
  <body>
    <header class="header">
      <div class="container">
        <h1 class="visually-hidden sr-only"><?php bloginfo('name'); ?></h1>
        <img src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="PSD2CSS" />
      </div>
    </header>