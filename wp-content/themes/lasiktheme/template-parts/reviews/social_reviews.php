<div class="social-reviews">
  <ul class="social-reviews_tabs nav-tabs" role="tablist">
    <li class="active">
      <a href="#facebook-panel"
         id="facebook-tab"
         class="tab facebook-tab active"
         role="tab"
         title="facebook"
         aria-controls="facebook-panel"
         aria-selected="true">
        <svg viewBox="0 0 264 512" aria-hidden="true">
          <use xlink:href="#lca-facebook-icon"></use>
        </svg>
      </a>
    </li>
    <li>
      <a href="#yelp-panel"
         id="yelp-tab"
         class="tab yelp-tab"
         title="yelp"
         role="tab"
         aria-controls="yelp-panel"
         aria-selected="false">
        <svg viewBox="0 0 384 512" aria-hidden="true">
          <use xlink:href="#lca-yelp-icon"></use>
        </svg>
      </a>
    </li>
    <li>
      <a href="#google-panel"
         id="google-tab"
         class="tab google-tab"
         title="google"
         role="tab"
         aria-controls="google-panel"
         aria-selected="false">
        <svg viewBox="0 0 640 512" aria-hidden="true">
          <use xlink:href="#lca-google-icon"></use>
        </svg>
      </a>
    </li>
  </ul>

  <div class="tab-content">
    <div
      class="tab-panel active"
      id="facebook-panel"
      role="tabpanel"
      aria-labelledby="facebook-tab">
      <div class="panel-header">
        <h2>
          We love the folks in our Facebook community
        </h2>
        <div class="rating">
          <div>
            <span class="number">4.5</span>
            <?php get_template_part( 'template-parts/reviews/star_bar' ) ?>
          </div>
          <div class="amount-reviews">12,499 Reviews</div>
        </div>
      </div>
      <ul class="review-list">
        <?php get_template_part( 'template-parts/reviews/review' ) ?>
        <?php get_template_part( 'template-parts/reviews/review' ) ?>
      </ul>
      <div class="panel-footer">
        <svg viewBox="0 0 49 60">
          <use xlink:href="#lca-clipboard"></use>
        </svg>
        <p>
          31,044 Facebook folks have checked into our vision centers.
        </p>
      </div>
    </div>
    <div
      class="tab-panel"
      id="yelp-panel"
      role="tabpanel"
      aria-labelledby="yelp-tab">
      <div class="panel-header">
        <h2>
          Yelp users across the country are talking about <span class="brand-name"><span>Lasik</span><span>Plus</span></span>.
        </h2>
        <div class="rating">
          <div>
            <span class="number">4.5</span>
            <?php get_template_part( 'template-parts/reviews/star_bar' ) ?>
          </div>
          <div class="amount-reviews">12,499 Reviews</div>
        </div>
      </div>
      <ul class="review-list">
        <?php get_template_part( 'template-parts/reviews/review' ) ?>
        <?php get_template_part( 'template-parts/reviews/review' ) ?>
      </ul>
      <div class="panel-footer">
        <svg viewBox="0 0 49 60">
          <use xlink:href="#lca-clipboard"></use>
        </svg>
        <p>
          31,044 Yelp folks have checked into our vision centers.
        </p>
      </div>
    </div>
    <div
      class="tab-panel"
      id="google-panel"
      role="tabpanel"
      aria-labelledby="google-tab">
      <div class="panel-header">
        <h2>
          Our Google reviews speak to the LASIK experience with our teams!
        </h2>
        <div class="rating">
          <div>
            <span class="number">4.5</span>
            <?php get_template_part( 'template-parts/reviews/star_bar' ) ?>
          </div>
          <div class="amount-reviews">12,499 Reviews</div>
        </div>
      </div>
      <ul class="review-list">
        <?php get_template_part( 'template-parts/reviews/review' ) ?>
        <?php get_template_part( 'template-parts/reviews/review' ) ?>
      </ul>
      <div class="panel-footer">
        <svg viewBox="0 0 49 60">
          <use xlink:href="#lca-clipboard"></use>
        </svg>
        <p>
          31,044 Google folks have checked into our vision centers.
        </p>
      </div>
    </div>
  </div>
</div>