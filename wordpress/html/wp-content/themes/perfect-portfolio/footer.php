<?php
/**
 * The footer for the theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" itemscope itemtype="https://schema.org/WPFooter">

  <div class="bottom-footer">
    <div class="tc-wrapper">
      <div class="copyright">
        <?php if ( function_exists( 'the_privacy_policy_link' )) {
          the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
        } 
          perfect_portfolio_get_footer_copyright();
        ?>
      </div>
      <div class="foot-social">
        <?php perfect_portfolio_social_links(); ?>
      </div>
    </div>
  </div>

  <script src="<?php echo get_stylesheet_directory_uri().'/js/pace.min.js' ?>"></script>
  <script src="<?php echo get_stylesheet_directory_uri().'/js/jquery-3.2.1.min.js' ?>"></script>
  <script src="<?php echo get_stylesheet_directory_uri().'/js/main.js' ?>"></script>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>