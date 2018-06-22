<?php 
class Sidebar_Nav extends Walker_Nav_Menu {
        public function start_lvl( &$output, $depth = 0, $args = array() )
        {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat( $t, $depth );

            // Default class.
            $classes = array( 'sidenav__item' );

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

            // $indent .= "<li class='sidenav__item'><a href='#' class='sidenav__link'>Home</a></li>";


            $output .= "<div class='submenu'>";
            $output .= "<a href='#' class='submenu__back submenu-toggle'>Back</a>";
            $output .= "{$n}{$indent}<ul class='submenu__list'>{$n}";
        }

        public function end_lvl( &$output, $depth = 0, $args = array() )
        {
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
        }
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
        {
            $object = $item->object;
            $title = $item->title;
            $description = $item->description;
            $permalink = $item->url;
            $data_attr = $item->attr_title;
            $this->data_dropdown = $data_attr;            
            
            $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
            if( in_array('toggler', $item->classes) ) {
                return false;
            }
            if($data_attr !== '') {
                if(in_array('menu__item', $item->classes)) {
                    $output .= "<li class='sidenav__item submenu-item'>";
                }
                else {
                    $output .= "<li class='submenu__item'>";
                }
            }
            else {
                $output .= "<li class='sidenav__item'>";
            }
            if( $permalink && $permalink != '#' ) {
                // if is top level logic
                if(in_array('menu__item', $item->classes)) {
                    if($args->walker->has_children) {
                        $output .= '<a href="' . $permalink . '" class="sidenav__link submenu-toggle">';
                    }
                    else {
                        $output .= '<a href="' . $permalink . '" class="sidenav__link">';
                    }
                }
                else {
                    $output .= '<a href="' . $permalink . '" class="sidenav__link">';
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
        }

        public function end_el( &$output, $item, $depth = 0, $args = array() )
        {
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

    