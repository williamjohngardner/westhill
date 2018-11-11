<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />
    <title><?php bloginfo( 'name' )?> | Digital Marketing</title>

    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
  </head>
  <body <?php body_class(); ?>>
    <header>
      <a href="<?php bloginfo('url'); ?>"><img src="Logo_opt_375px.png" alt="Dogwood Digital Logo"></a>
      <button name="cta">Contact Us</button>
    </header>
    <nav class="main-menu">
      <?php
        $defaults = array(
          // 'container' => true,
          'theme_location' => 'main-menu',
          'menu_class' => 'main-menu',
          'menu' => 'Main Menu',
          'container_id' => 'cssmenu',
          'walker' => new CSS_Menu_Walker()
        );
        wp_nav_menu( $defaults );
      ?>
    </nav>