<?php

function mytheme_register_styles() {
  wp_register_style('bootstrap-theme', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20151005', 'all' );
  wp_register_style('webfont', 'https://fonts.googleapis.com/css?family=Slabo+27px');
  wp_register_style('style', get_template_directory_uri() . '/css/style.css', array('webfont'), '20151109', 'all' );
  wp_enqueue_style('bootstrap-theme');
  wp_enqueue_style('webfont');
  wp_enqueue_style('style');
}

function mytheme_enqueue_scripts() {
  // register AngularJS
  wp_register_script('angular-core', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular.js', array(), null, false);
  wp_register_script('angular-sanitize', get_bloginfo('template_directory').'/js/angular-sanitize.min.js', array('angular-core'), null, false);
  wp_register_script('angular-route', get_bloginfo('template_directory').'/js/angular-route.min.js', array('angular-core'), null, false);
  wp_register_script('angular-touch', get_bloginfo('template_directory').'/js/angular-touch.min.js', array('angular-core'), null ,false);
  wp_register_script('jquery', get_bloginfo('template_directory').'/js/jquery-2.1.4.min.js', array(), null, false);
  wp_register_script('bootstrap-tabs', get_bloginfo('template_directory').'/js/bootstrap.min.js', array('jquery'), null, false);




  // register our app.js, which has a dependency on angular-core
  wp_register_script('angular-app', get_bloginfo('template_directory').'/app.js', array('angular-core', 'angular-touch',  'jquery'), null, false);
  wp_register_script('angular-navigation', get_bloginfo('template_directory').'/js/controllers/navigation.js', array('angular-core', 'jquery', 'angular-app'), null, false);
  wp_register_script('angular-swipe-ctrl', get_bloginfo('template_directory').'/js/modules/webAppNavigation/WebApp.navigation.js', array('angular-touch'), null, false);

  // enqueue all scripts
  wp_enqueue_script('angular-core');
  wp_enqueue_script('angular-sanitize');
  wp_enqueue_script('angular-route');
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap-tabs');
  wp_enqueue_script('angular-app');
  wp_enqueue_script('angular-swipe-ctrl');
  wp_enqueue_script('angular-navigation');
}

add_action('wp_enqueue_scripts', 'mytheme_register_styles');
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');
?>