<?php
class Header_Nav extends Walker_Nav_Menu {

    private $data_dropdown;

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );

        // Default class.
        $classes = array( 'dropdown__list' );

        /**
         * Filters the CSS class(es) applied to a menu list element.
         *
         * @since 4.8.0
         *
         * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
         * @param stdClass $args    An object of `wp_nav_menu()` arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= "<div class='dropdown' data-dropdown='{$this->data_dropdown}'>";
        $output .= "{$n}{$indent}<ul$class_names>{$n}";


    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        $output .= "$indent</ul>{$n}";
        $output .= "</div>";

        // print_r($output);
        // die("<<<");
    }
    
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $object = $item->object;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;
        $data_attr = $item->attr_title;
        $this->data_dropdown = $data_attr;
        
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        if($data_attr !== '')
            if(in_array('menu__item', $item->classes)) {
                $output .= "<li class='" .  implode(" ", $item->classes) .  "' data-dropdown-item=".$data_attr.">";
            }
            else {
                $output .= "<li class='" .  implode(" ", $item->classes) .  "'>";
            }
        else {
            $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        }
        if( $permalink && $permalink != '#' ) {
            // if is top level
            if(in_array('menu__item', $item->classes)) {
                $output .= '<a href="' . $permalink . '" class="menu__link">';
            }
            else {
                $output .= '<a href="' . $permalink . '">';

            }
        } else {
            $output .= '<span>';
        }
        $output .= $title;

        if( $description != '' && $depth == 0 ) {
            $output .= '<small class="description">' . $description . '</small>';
        }
        if( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }

       
       // $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        
        $output .= "</li>{$n}";
    }

}

