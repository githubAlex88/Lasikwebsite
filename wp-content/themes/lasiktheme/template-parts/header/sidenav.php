<!--=== Sidenav start ===-->
<div class="sidenav" id="mobile-menu">

  <button type="button" class="sidenav__close sidenav-close" aria-hidden="true">
    <i class="far fa-times"></i>
  </button>

  <?php 
    $home_url = home_url();
    $args = array(
      'menu'        =>  'header-menu',
      'menu_class'  =>  'menu',
      // 'before'      =>  '<li class="sidenav__item"><a href="#"" class="sidenav__link">Home</a></li>',
      'items_wrap'  => "<ul class='sidenav__list'>
                          <li class='sidenav__item'>
                            <a href=". $home_url. " class='sidenav__link'>Home</a>
                          </li>
                          " . '%3$s' . "
                        </ul>",
      'container'   => '',
      'walker'      => new Sidebar_Nav()
    );

    wp_nav_menu( $args );
  ?>
  <!-- <ul class="sidenav__list">

    <li class="sidenav__item">
      <a class="sidenav__link" href="#" >
        Home
      </a>
    </li>

    
  </ul> -->

  <div class="sidenav__footer">
    <div class="actions">
      <div class="actions__item">
        <a href="tel:1.866.755.2026" class="actions__link">
          <i class="fal fa-mobile actions__icon"></i>
          <p class="actions__caption">Call Us</p>
        </a>
      </div>
      <div class="actions__item">
        <a href="#" class="actions__link">
          <i class="far fa-comment actions__icon"></i>
          <p class="actions__caption">Live Chat</p>
        </a>
      </div>
      <div class="actions__item">
        <a href="#search-modal" class="actions__link modal-trigger">
          <i class="far fa-search actions__icon"></i>
          <p class="actions__caption">Search</p>
        </a>
      </div>
    </div>
    <a href="#" class="sidenav__button button button-secondary">
      <i class="far fa-calendar-alt"></i>
      <span>
        Schedule Free Eye Exam
      </span>
    </a>
  </div>
</div>
<!--=== Sidenav end ===-->