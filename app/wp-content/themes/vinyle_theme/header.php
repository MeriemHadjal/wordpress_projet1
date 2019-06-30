<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Vinyles</title>

  <!-- Ajout d'une nouvelle feuille de style qui sera spécifique à notre thème -->
  <link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
  <!-- HTML5 shim et Respond.js pour supporter les éléments HTML5 pour les versions plus anciennes que Internet Explorer 9 -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

  <?php wp_head(); ?>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="http://localhost:8080"><img src="http://localhost:8080/wp-content/themes/vinyle_theme/assets/img/logo_trace_blanc.svg" alt="logo" width="100"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <?php wp_nav_menu(array("theme_location" => 'top', "container_class" => 'mon_menu')); ?>
 
      <div class="equaliser">
      <div class="eq_element">
    <span class="first_line"></span>
    <span class="second_line"></span>
    <span class="third_line"></span>
    <span class="fourth_line"></span>
    <span class="fifth_line"></span>
  </div>
  </div>
</nav>
        <!-- <a class="navbar-brand" href="http://localhost:8080/" class="logo_equaliser">
          <div class="w-100 equaliser">
            <div class="equaliser-container">

              <ol class="all_column column1">
                <li class="color-bar"></li>
              </ol>
              <ol class="all_column column2">
                <li class="color-bar"></li>
              </ol>
              <ol class="all_column column3">
                <li class="color-bar"></li>
              </ol>
              <ol class="all_column column4">
                <li class="color-bar"></li>
              </ol>
              <ol class="all_column column5">
                <li class="color-bar"></li>
              </ol>
            </div>
          </div>
        </a> -->
      
    

  </header>