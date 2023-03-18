<?php
/**
 * The header for the theme
 */
?>

<!doctype html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link href="<?php echo get_stylesheet_directory_uri(). '/css/style.css' ?>" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">

    <div id="preloader">
      <div id="loader"></div>
    </div>

    <header class="s-header">

      <div class="header-logo">
        <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 103">
            <rect x="64.05" width="21.91" height="103" />
            <path
              d="M51.77,61.48H33.05c-7.48-1.92-4.94-6.54-4.08-7.8L49.2,30.48a3.62,3.62,0,0,0-2.73-6H10.23C24,28,16.3,37.34,16.3,37.34h0L1,54.92a4,4,0,0,0,3,6.56H32.75L1,96.41A3.94,3.94,0,0,0,4,103H42.07c-11.86-6-7.61-13.43-5.51-16.09l17.8-19.6A3.49,3.49,0,0,0,51.77,61.48Z" />
            <path
              d="M148.5,93.4,120.87,63a2.27,2.27,0,0,1,0-3l23.81-27.31a4.91,4.91,0,0,0-3.7-8.14H108c10,2.57,9.43,8.49,7.21,11.06L95.94,57.62A5.73,5.73,0,0,0,96,65.24l19.52,21.5c2,2.49,6.76,10.11-5.36,16.26h34.08A5.74,5.74,0,0,0,148.5,93.4Z" />
          </svg>
        </a>
      </div>

      <nav class="header-nav-wrap">
        <?php
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_class'     => 'header-main-nav',
            'fallback_cb'    => 'perfect_portfolio_primary_menu_fallback',
          ));
        ?>
      </nav>
      <a class="header-menu-toggle" href="#"><span></span></a>
    </header>

    <div id="content" class="site-content"><!-- content -->