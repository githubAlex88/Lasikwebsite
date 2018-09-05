<?php
/**
 * Plugin Name:  Search
 * Description:  Add ajax searching to modals
 * Version:      0.1
 * Text Domain: lasik-search
 * Domain Path: /languages/
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Define global variables
if ( ! defined( 'LASIK_SEARCH_DIR' ) )
  define( 'LASIK_SEARCH_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

if ( ! class_exists( 'Lasik_Search' ) ) :

  /**
   * Main Class.
   *
   * @class Lasik_Search
   */
  class Lasik_Search {

    /**
     * Initialize.
     */
    public function __construct() {
      // Init
      add_action( 'init', array( $this, 'init' ), 0 );
    }

    /**
     * Init.
     */
    public function init() {
      // Register ajax methods
      add_action( 'wp_ajax_get_search_results', array( $this, 'get_search_results' ) );
      add_action( 'wp_ajax_nopriv_get_search_results', array( $this, 'get_search_results' ) );
      add_action( 'wp_footer', array( $this, 'print_search_ajax_url' ) );

      // Localization
      load_plugin_textdomain( 'lasik-search', false, LASIK_SEARCH_DIR . '/languages' );
    }

    public function get_search_results() {
      $query = $_POST['query'];

      // Start output buffer
      ob_start();

      // Get vision centers matching searching terms
      $args = array(
        'numberposts'	=> -1,
        'post_type'		=> 'lasik_location',
        's' => $query,
        'meta_query' => array(
          'relation' => 'OR',
          array(
            'key' => 'team_member_vision_centers',
            'value' => '"' . get_the_ID() . '"',
            'compare' => 'LIKE'
          )
        )
      );
      $locations_query = new WP_Query( $args );

      if( $locations_query->have_posts() ):
        while( $locations_query->have_posts() ) :
          $locations_query->the_post();
          // Get team members for current vision center
          $team_members = get_posts( array(
            'post_type' => 'lasik_team_member',
            'meta_query' => array(
              array(
                'key' => 'team_member_vision_centers',
                'value' => '"' . get_the_ID() . '"',
                'compare' => 'LIKE'
              )
            )
          ));
          foreach ( $team_members as $team_member ) : ?>
            <!--=== Vision item start ===-->
            <div class="vision-item search-item">
              <div class="vision-item__img-wrapper">
                <div class="vision-item__header">
                  <a href="<?php the_permalink(); ?>" class="vision-item__name"><span class="search-field"><?php the_field( 'location_city' ); ?></span>, <?php echo get_field( 'location_state' )['value']; ?> LasikPlus Vision Center</a>

                  <div class="vision-item__reviews">
                    <div class="rating">
                      <div class="rating__content">
                        <span class="rating__number">4.5</span>
                        <!--=include ../common/star_bar.html -->
                      </div>
                      <a href="#" class="rating__reviews">330 Google Reviews</a>
                    </div>
                  </div>

                </div>
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo the_title(); ?>" class="vision-item__img">
              </div>

              <div class="vision-item__body">
                <div class="vision-item__content">
                  <div class="vision-item__doctor">
                    <img src="<?php echo get_the_post_thumbnail_url( $team_member->ID ); ?>" alt="Dr. <?php echo get_the_title( $team_member->ID ); ?>">
                  </div>
                  <div class="vision-item__info">
                    <h3 class="vision-item__title">
                      <a href="#">Dr. <span class="search-field"><?php echo get_the_title( $team_member->ID ); ?></span></a>
                    </h3>
                    <p class="vision-item__text"><?php the_field( 'location_address' ); ?></p>
                    <p class="vision-item__text"><?php the_field( 'location_city' ); ?>, <?php echo get_field( 'location_state' )['value']; ?> <span class="search-field"><?php the_field( 'location_zip' ); ?></span></p>
                  </div>
                </div>
                <a href="#" class="btn-simple btn-simple--icon btn-simple--orange btn-simple--full-width">
                  <i class="far fa-calendar-alt btn-simple__icon"></i>
                  <span class="btn-simple__text btn-simple__text--small">
                      Schedule Free Eye Exam at our <?php the_field( 'location_city' ); ?> Vision Center
                    </span>
                </a>
              </div>
            </div>
            <!--=== Vision item finish ===-->
          <?php endforeach; ?>
        <?php endwhile;
      endif;
      wp_reset_query();

      // Get articles matching searching terms
      $args = array(
        'numberposts'	=> -1,
        'post_type'		=> 'post',
        's' => $query
      );
      $locations_query = new WP_Query( $args );
      if( $locations_query->have_posts() ):
        while( $locations_query->have_posts() ) :
          $locations_query->the_post(); ?>
          <!--=== Article item finish ===-->
          <div class="search-article search-item">
            <div class="search-article__img">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo the_title(); ?>">
            </div>
            <div class="search-article__info">
              <div class="search-article__category">
                  <span class="search-field">
                    <?php
                    $categories = get_the_category();
                    if( !empty($categories) )
                      echo esc_html( $categories[0]->name );
                    ?>
                  </span>
              </div>
              <div class="search-article__title">
                <a href="<?php the_permalink(); ?>">
                  <span class="search-field"><?php echo the_title(); ?></span>
                </a>
              </div>
              <div class="search-article__description">
                <span class="search-field"><?php the_excerpt(); ?></span>
              </div>
            </div>
          </div>
          <!--=== Article item finish ===-->
        <?php endwhile;
      endif;
      wp_reset_query();

      // Render output buffer
      $content = ob_get_clean();
      echo $content;

      die();
    }

    public function print_search_ajax_url() {
      ?>
      <script>
        var search_ajax_url = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
      </script>
      <?php
    }
  }

endif;

new Lasik_Search();