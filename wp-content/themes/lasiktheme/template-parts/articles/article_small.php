<!--=== Article item start ===-->
<article class="article-item article-item--small">
  <div class="article-item__image-wrapper">
    <a href="<?php the_permalink(); ?>">
      <picture>
        <source media="(min-width: 540px)" data-srcset="<?php the_post_thumbnail_url(); ?>" />
        <img class="article-item__img img-lazy" alt="article" data-src="<?php the_post_thumbnail_url(); ?>">
        <noscript>
          <img class="img-lazy" alt="article" src="<?php the_post_thumbnail_url(); ?>" />
        </noscript>
      </picture>
    </a>
    <a href="<?php the_permalink(); ?>" class="article-item__category article-item__category--small hide-on-small-only"><?php the_title(); ?></a>
    <div class="article-item__date">
      <div class="article-item__day"><?php the_time('d'); ?></div>
      <div class="article-item__month"><?php the_time('M'); ?></div>
    </div>
  </div>
  <!--=== Article item body start ===-->
  <div class="article-item__body">
    <div class="article-item__type hide-on-small-only">
      <span>ARTICLE</span>
    </div>
    <div class="row">
      <div class="col s12 m12">
        <h2 class="article-item__title article-item__title--small">
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m12">
        <p class="article-item__excerpt">
          <?php the_excerpt(); ?>
        </p>
      </div>
      <div class="col s12 m12 hide-on-med-and-down">
        <ul class="badges-list">
          <?php
          $article_tags = get_the_tags();

          if ( $article_tags ) :
            foreach( $article_tags as $tag ) :
              ?>
              <li class="badges-list-item badge-gray">
                <a href="<?php echo get_tag_link($tag); ?>">
                  <?php echo $tag->name; ?>
                </a>
              </li>
            <?php
            endforeach;
          endif;
          ?>
        </ul>
      </div>
    </div>
  </div>
  <!--=== Article item body end ===-->
</article>
<!--=== Article item end ===-->