<?php
/*
Template Name: home
*/
get_header(); ?>

<main>
  <section class="hero">
    <div class="container">
      <h1 class="heading">Make ordinary to extraordinary<br>by design.</h1>
      </div>
    </div>
  </section>

  <?php
  do_action( 'rrtc_before_portfolios' ); ?>

  <div class="portfolio-holder">
    <div class="container">
      <div class="container-content">
        <div class="top-section_TtlBox wokrs-nav">
          <h2 class="top-section_Ttl">selected works</h2>
          <a class="top-section_Btn" href="<?php echo esc_url( get_permalink( get_page_by_title( 'portfolio' ) ) ); ?>">see all
            <svg fill="#2C353A" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
          </a>
        </div>
      </div>
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
          <?php
        }
        $arg = apply_filters(
          'rrtc_portfolio_args',
          array(
            'post_type'       => 'rara-portfolio',
            'post_status'     => 'publish',
            'posts_per_page'  => 6
          )
        );
        $portfolio_qry = new WP_Query( $arg );
        if( taxonomy_exists( 'rara_portfolio_categories' ) && $portfolio_qry->have_posts() ){ 
      ?>

      <div class="portfolio-img-holder wokrs-content">
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

</main>

<?php get_footer();