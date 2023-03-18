<?php
/*
Template Name: Portfolio
*/
get_header(); ?>

<main>
  <?php
  do_action( 'rrtc_before_portfolios' ); ?>

  <div class="portfolio-holder">
    <div class="container">
      <div class="container-content">
        <?php
          $args = apply_filters(
            'rrtc_taxonomy_args',
            array(
              'taxonomy'       => 'rara_portfolio_categories',
              'orderby'        => 'name',
              'order'          => 'ASC',
            )
          );
          $terms = get_terms( $args );

          if( $terms ){ ?>
            <div class="portfolio-sorting">        
              <button data-sort-value="*" class="button is-checked"><?php echo esc_html_e( 'All', 'raratheme-companion' ); ?></button>
              <?php
                foreach( $terms as $t ){                            
                  echo '<button class="button" data-sort-value=".' . esc_attr( $t->slug ) .  '">' . esc_html( $t->name ) . '</button>';
                } 
              ?>
            </div><!-- .portfolio-sorting -->
          <?php
          }

          if( $terms ){ ?>
            <?php
          }
          $arg = apply_filters(
            'rrtc_portfolio_args',
            array(
              'post_type'       => 'rara-portfolio',
              'post_status'     => 'publish',
              'posts_per_page'  => 10
            )
          );
          $portfolio_qry = new WP_Query( $arg );
          if( taxonomy_exists( 'rara_portfolio_categories' ) && $portfolio_qry->have_posts() ){ 
        ?>
      </div>

      <div class="portfolio-img-holder">
        <?php
          while( $portfolio_qry->have_posts() ){
            $portfolio_qry->the_post();
            $terms = get_the_terms( get_the_ID(), 'rara_portfolio_categories' );
            $s = '';
            $i = 0;
            if( $terms ){
              foreach( $terms as $t ){
                $i++;
                $s .= $t->slug;
                if( count( $terms ) > $i ){
                  $s .= ' ';
                }
              }
            }
            $term_list = get_the_term_list( get_the_ID(), 'rara_portfolio_categories' );
            if( has_post_thumbnail() ){
              $image_size = apply_filters( 'rrtc_portflio_image', 'full' ); ?>
              <div class="portfolio-item <?php echo esc_attr( $s );?> wokrs-content_box item">
                <div class="portfolio-item-inner wokrs-content_boxHero">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $image_size ); ?></a>
                  <div class="portfolio-text-holder">
                    <?php if( $term_list ) echo '<div class="portfolio-cat">' . $term_list . '</div>'; ?>
                    <div class="portfolio-img-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                  </div>
                </div>
              </div>
            <?php 
            } 
          } 
        ?>
      </div><!-- .portfolio-img-holder -->
    <?php } ?>
  </div>
</div><!-- .portfolio-holder -->

<?php
  /**
   * Action after portfolios
  */
  do_action( 'rrtc_after_portfolios' );?>
</main>

<?php get_footer();