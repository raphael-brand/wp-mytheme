<!DOCTYPE html>
<html <?php language_attributes(); ?> ng-app="myapp">
<head>
  <title>Raphael Brand - Frontend-Development</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="Raphael Brand, ein Frontend-Entwickler in Berlin. Hier gibt es statische oder redaktionelle Websites. Mit jQuery oder AngularJS von Google. Der neueste Schrei." name="description">
  <meta content="index, follow" name="robots">
  <meta content="10 days" name="revisit-after">
  <meta content="Frontend, jQuery, AngularJS, JavaScript, Webentwicklung, Web-Programmierer, Berlin, CSS3, HTML5, Web, Information, Technologie, Dienste" name="keywords">
  <?php wp_head();?>
</head>
<body>
<div class="container">
	<div class="navbar navbar-default" role="navigation">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#js-navbar-collapse">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </button>
	    </div>
	    <div ng-controller="NavBarCtrl as ctrl" ng-init="ctrl.make_ng_links()" class="collapse navbar-fixed" id="js-navbar-collapse">
	        <?php
	            wp_nav_menu(array(
	                'main' => __( 'Primary Menu', 'mytheme'),
	                'menu_class' => 'nav navbar-nav nav-tabs',
	            ));
	        ?>
	    </div>
	</div>
