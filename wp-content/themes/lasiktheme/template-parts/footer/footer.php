<footer class="footer">
  <div class="container">
    <div class="footer__content">
      <?php if(!dynamic_sidebar('footer-widget-1')) : ?>
        <h3>Sidebar</h3>
        <p>Please add widgets to the sidebar to have them displayed in this area. </p>
      <?php endif; ?>
      <?php if(!dynamic_sidebar('footer-widget-2')) : ?>
        <h3>Sidebar</h3>
        <p>Please add widgets to the sidebar to have them displayed in this area. </p>
      <?php endif; ?>
      <?php if(!dynamic_sidebar('footer-widget-3')) : ?>
        <h3>Sidebar</h3>
        <p>Please add widgets to the sidebar to have them displayed in this area. </p>
      <?php endif; ?>
      <?php if(!dynamic_sidebar('footer-social-widget')) : ?>
        <h3>Sidebar</h3>
        <p>Please add widgets to the sidebar to have them displayed in this area. </p>
      <?php endif; ?>
      <?php if(!dynamic_sidebar('footer-additional-widget')) : ?>
        <h3>Sidebar</h3>
        <p>Please add widgets to the sidebar to have them displayed in this area. </p>
      <?php endif; ?>
      <div class="footer__item show-on-small hide-on-med-only show-on-large">
        <?php
        $menu_id = get_nav_menu_locations()['header-menu'];
        if( !$menu_id ) return false;
        $current_menu_item = wp_get_nav_menu_items( $menu_id , 
          array(
            'meta_key'    =>  '_menu_item_object_id',
            'meta_value'  =>  $post->ID
          ) 
        );
        $menu_items = wp_get_nav_menu_items( $menu_id );

        $pages = array();
        foreach ($menu_items as $page) {
           $pages[] += $page->ID;
        }
        if( !empty($current_menu_item) ) {
          $current = array_search($current_menu_item[0]->ID, $pages);
        }
        else $current = -1;

        
        $nextID = $pages[$current+1];
        $next_menu_item = null;
        foreach ($menu_items as $item) {
          
          if($nextID == $item->ID) {
            $next_menu_item = $item;
            break;
          }
        }

        ?>
        <?php
        if (!empty($nextID)) { ?>
        <div class="next-page">
          Next: 
        <a href="<?php echo $next_menu_item->url; ?>">
          <?php echo $next_menu_item->title; ?>    
        </a>
        </div>
        <?php } ?>
      
      </div>
    </div>
  </div>
    <div class="container">
      <div class="footer-copyright">
        @ 2018 LasikPlus.  All Rights Reserved.  Website by FNCTN.
        <div class="next-page hide-on-small-only show-on-medium hide-on-large-only">Next:&nbsp;<a href="#">Find a Vision Center</a></div>
      </div>
    </div>
</footer>
