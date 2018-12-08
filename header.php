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
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">
  </head>
  <body <?php body_class(); ?>>
    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
            <a href="<?php bloginfo('url'); ?>"><img id="logo-main" src="<?php bloginfo('template_directory'); ?>/images/Logo_opt_375px.png" alt="Dogwood Digital Logo"></a>
          </div>
          <div class="col-3"></div>
          <div class="col-4">
            <button name="cta" class="cta shiftnav-toggle shiftnav-toggle-button" 
            data-shiftnav-target="slide_out_contact_form" id="headercta">Contact Us</button>
          </div>
          <div class="col-1"></div>
        </div>
      </div>
    </header>
    <nav class="main-menu container-fluid">
      <div class="row">
        <div class="col-5">
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
        </div>
        <div class="col-7"></div>
      </div>
    </nav>