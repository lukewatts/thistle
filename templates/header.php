<?php require_once('app/build.php'); ?>
<!DOCTYPE html>
<html class="no-js" lang="<?php echo $site['lang'] ?>">
  <head>

  	<!-- META -->
    <meta charset="<?php echo $site['charset']; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- VIEWPORT META -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- iOS APP META -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- TITLE -->
    <title><?php echo $site['seotitle']; ?></title>

    <!-- SEO -->
    <meta name="description" content="<?php echo $site['description']; ?>">
    <meta name="robots" content="<?php $robots = ( $site['searchable'] == true ) ? 'INDEX,FOLLOW' : 'NOINDEX, NOFOLLOW'; echo $robots; ?>">
    <meta author="<?php echo $site['author']; ?>">

    <!-- CANONICAL META -->
    <link rel="canonical" href="<?php base_url(); ?>">

    <!-- FAVICON -->
    <!-- Simply place favicon.ico in the root directory for your defaul favicon -->

    <!-- APPLE & ANDROID TOUCH ICON -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="apple-touch-icon" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-startup-image" href="/splash-startup.png">

    <!-- WINDOWS 8 START SCREEN TILE -->
    <meta name="msapplication-TileColor" content="<?php // #272727 ?>">
    <meta name="msapplication-TileImage" content="<?php base_url(); ?>/apple-touch-icon-precomposed.png">

    <!-- WINDWOS MOBILE -->
    <meta name="MobileOptimized" content="width">

    <!-- FACEBOOK -->
    <meta property="og:image" content="<?php base_url(); ?>/assets/img/avatar.png">
    <meta property="og:title" content="<?php $page_name = ( $url->is_home() ) ? 'index' : $url->get_page_name(); echo $page_meta[$page_name]['name'] ?>"> <?php // TODO: Make this...nicer ?>
    <meta property="og:site_name" content="<?php echo $site['title']; ?>">
    <meta property="og:url" content="<?php $url->uri(); ?>">
    <meta property="og:description" content="<?php echo $site['description']; ?>">

    <!-- STYLES -->
	<?php $html->css( 'css/normalize.css' ); ?>

		<!-- SCRIPTS -->

  </head>
  <body id="" class="">
  	
  	<!-- HEADER -->
  	<header id="site-header" class="site=-header" role="banner">

  		<nav id="main-nav" class="main-nav" role="navigation">
  		  
        <ul class="top-level-menu">
  		 		<li class="menu-item <?php echo ( $url->is_home() ) ? 'active' : ''; ?>">
            <a href="<?php $url->home_uri(); ?>">Home</a>
          </li>
          <li class="menu-item <?php echo ( $url->is_page( 'sample-page' ) ) ? 'active' : ''; ?>">
            <a href="<?php $url->page( 'sample-page' ); ?>">Sample Page</a>
          </li>
  		  </ul>

  		</nav>

  	</header>