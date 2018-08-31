<!--=== Header start ===-->
<header class="header">
  <!--=== Header Top start ===-->
  <div class="header-top">
    <div class="header-top__content">

      <ul class="header-top__list hide-on-med-and-up">
        <li class="header-top__item">
          <a class="header-top__link sidenav-trigger" data-target="mobile-menu" href="#" aria-label="menu">
            <i class="far fa-bars header-top__icon"></i>
          </a>
        </li>
        <li class="header-top__item">
          <a href="<?php echo get_home_url();?>" title="home" class="brand-logo">
            <svg viewBox="0 0 862.29 195.78"><use xlink:href="#lca-logo-white"></use></svg>
          </a>
        </li>
      </ul>

      <ul class="header-top__list">
        <li class="header-top__item">
          <a class="header-top__link" href="tel:1.866.755.2026" aria-label="phone">
            <i class="fal fa-mobile header-top__icon"></i>
            <span class="text-gray hide-on-med-and-down">Call Us: </span>
            <strong class="text-white hide-on-small-only">1.866.755.2026</strong>
          </a>
        </li>
        <li class="header-top__item hide-on-med-and-down">
          <a class="header-top__link" href="tel:1.866.921.2394">
            <span class="text-gray">Espanol: </span>
            <strong class="text-white">1.866.921.2394</strong>
          </a>
        </li>
        <li class="header-top__item">
          <a class="header-top__link" href="#" aria-label="chat">
            <i class="far fa-comment header-top__icon"></i>
            <span class="text-gray hide-on-med-and-down">Live</span>
            <strong class="text-white hide-on-small-only">Chat</strong>
          </a>
        </li>
        <li class="header-top__item header-top__item--no-margin hide-on-med-and-up">
          <a class="header-top__link header-top__icon modal-trigger" href="#search-modal" aria-label="search">
            <i class="far fa-search header-top__icon"></i>
          </a>
        </li>
      </ul>
      
      <div class="header-top__info hide-on-small-only">
        <ul class="header-top__list">
          <li class="header-top__item header-top__item--no-margin">
            <a class="header-top__link" href="#">
              <i class="far fa-map-marker header-top__icon"></i>
              
              <span class="text-gray">Cinncinati, OH</span>
            </a>
            <a class="modal-trigger" href="#location-modal">
              <strong class="text-white">Change</strong>
            </a>
          </li>
        </ul>

        <a href="#" class="header-top__btn waves-effect waves-light">
          <i class="far fa-calendar-alt icon-calendar"></i> 
          <span>Book a <strong>FREE</strong> consultation</span>
        </a>
      </div>

    </div>
  </div>
  <!--=== Header Top end ===-->
  <!--=== Header Bottom start ===-->
  <div class="header-bottom hide-on-small-only">
    
    <div class="header-bottom__logo">
      <a href="<?php echo get_home_url();?>" title="home" class="brand-logo">
        <svg viewBox="0 0 862.29 195.78">
            <use xlink:href="#lca-logo-white"></use>
        </svg>
      </a>
    </div>
    <!--=== Menu start ===-->
    <?php 
      $args = array(
        'menu'        =>  'header-menu',
        'menu_class'  =>  'menu',
        'items_wrap'  => '<nav class="menu">%3$s</nav>',
        'container'   => '',
        'walker'      => new Header_Nav()
      );

      wp_nav_menu( $args );
    ?>
   
  </div>
  <!--=== Header Bottom start ===-->
  
</header>