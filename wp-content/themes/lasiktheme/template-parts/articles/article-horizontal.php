<!--=== Article item start ===-->
<article class="article-item article-item--middle">
  <div class="row">

    <div class="col s12 m4">
      <div class="article-item__image-wrapper article-item__image-wrapper--no-margin">
        <a href="<?php the_permalink(); ?>">
          <picture>
            <source media="(min-width: 540px)" data-srcset="<?php the_post_thumbnail_url(); ?>" />
            <img class="article-item__img img-lazy" alt="article" data-src="<?php the_post_thumbnail_url(); ?>">
            <noscript>
              <img class="img-lazy" alt="article" src="<?php the_post_thumbnail_url(); ?>" />
            </noscript>
          </picture>
        </a>
        <div class="article-item__date hide-on-med-and-up">
          <div class="article-item__day"><?php the_time('d'); ?></div>
          <div class="article-item__month"><?php the_time('M'); ?></div>
        </div>
      </div>
    </div>

    <div class="col s12 m8">
      <!--=== Article item body start ===-->
      <div class="article-item__body">
        <div class="article-item__type hide-on-small-only">
          <span>ARTICLE</span>
        </div>
        <h2 class="article-item__title article-item__title--small">
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h2>
        <div class="row">
          <div class="col s12 m12">
            <p class="article-item__excerpt">
              <?php the_excerpt(); ?>
            </p>
          </div>
        </div>
      </div>
      <!--=== Article item body end ===-->
    </div>

  </div>
</article>
<!--=== Article item end ===-->
