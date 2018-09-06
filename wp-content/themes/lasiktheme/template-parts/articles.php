<section class="article-feed-section">
  <div class="article-feed-presentation" aria-hidden="true">
    <div class="upper-layer">
      <div class="layer-presentation"></div>
    </div>
    <div class="bottom-layer">
      <div class="layer-presentation"></div>
    </div>
  </div>
  <div class="container">
    <h2 class="article-feed-title"><?php the_field( 'article_feed_title' ); ?></h2>
  </div>
  <div class="article-feed-main">
    <div class="container">
      <div class="row article-feed__content">
        <div class="col s12 m8">
          <?php
          $post = $articles[0];
          setup_postdata( $post );
          include( locate_template( 'template-parts/articles/article-middle.php', false, false ) );
          wp_reset_postdata();
          ?>
          <div class="row">
            <?php if ( isset( $articles[1] ) ) : ?>
              <div class="col s12 m6">
                <?php
                $post = $articles[1];
                setup_postdata( $post );
                include( locate_template( 'template-parts/articles/article-small.php', false, false ) );
                wp_reset_postdata();
                ?>
              </div>
            <?php endif; ?>
            <?php if ( isset( $articles[2] ) ) : ?>
              <div class="col s12 m6">
                <?php
                $post = $articles[2];
                setup_postdata( $post );
                include( locate_template( 'template-parts/articles/article-small.php', false, false ) );
                wp_reset_postdata();
                ?>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="col s12 m4 social-reviews-wrapper">
          <?php get_template_part( 'template-parts/reviews/social_reviews', 'widgets' ) ?>
        </div>
        <div class="col s12 feed-banner-wrapper">
          <div class="feed-banner">
            <h2 class="feed-banner__title">
              <?php the_field( 'article_feed_banner_content' ); ?>
            </h2>
          </div>
        </div>
        <?php if ( isset( $articles[3] ) ) : ?>
          <div class="col s12">
            <?php
            $post = $articles[3];
            setup_postdata( $post );
            include( locate_template( 'template-parts/articles/article-large.php', false, false ) );
            wp_reset_postdata();
            ?>
          </div>
        <?php endif; ?>
        <?php if ( isset( $articles[4] ) ) : ?>
          <div class="col s12 m6">
            <?php
            $post = $articles[4];
            setup_postdata( $post );
            include( locate_template( 'template-parts/articles/article-horizontal.php', false, false ) );
            wp_reset_postdata();
            ?>
          </div>
        <?php endif; ?>
        <?php if ( isset( $articles[5] ) ) : ?>
          <div class="col s12 m6">
            <?php
            $post = $articles[5];
            setup_postdata( $post );
            include( locate_template( 'template-parts/articles/article-horizontal.php', false, false ) );
            wp_reset_postdata();
            ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>