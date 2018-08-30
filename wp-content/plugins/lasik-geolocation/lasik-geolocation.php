<?php 

/**
 * Plugin Name:  Geo Location
 * Description:  Get User's Current Location based on IP Adrress
 * Version:      0.1
*/

    class GeoLocation 
    {
        private $geo_location;
        private $location_data = [
            'city'      => '',
            'region'    => '',
            'loc'       => '',
            'postal'    => ''
        ];

        public function __construct()
        {
            add_action( 'init', array( $this, 'register_session' ) );
            add_shortcode( 'location' , array( $this, 'lasik_location_shortcode' ) );
            add_action( 'admin_post_nopriv_process_form', array( $this, "handle_location_form" ) );
            add_action( 'admin_post_process_form', array( $this, 'handle_location_form' ) );
        }

        public function handle_location_form()
        {
            if( !isset( $_POST['location_form_nonce'] ) || !wp_verify_nonce( $_POST['location_form_nonce'], 'location-nonce' ) ) {
                wp_die('Nonce could not be verified');
            }
            if( isset($_POST['location_data']) ) {
                setcookie( 'geolocation', $_POST['location_data'] , time() + (3 * 86400 * 30), "/" );
            }
            // $loc_data = json_decode( $location, true );
            // print_r( $location );
            wp_redirect($_REQUEST['_wp_http_referer']);
            exit;
        }

        public function register_session(){
            if( !session_id() )
                session_start();
            $this->geo_location = $this->get_geo_location();
        }

        public function lasik_location_shortcode()
        {
            $this->geo_location = $this->get_geo_location();
            $_SESSION['geolocation'] = $this->geo_location;
            return $this->geo_location;
        }

        public function get_geo_location( $ip = NULL )
        {
            $location = $this->get_location_from_cookie();
            if( $location ) {
                $location['region'] = $location['stateShort'];
                return $location;
            }
            $url        = 'https://ipinfo.io/json/';
            $args       = array( 'token' =>  '1fd5e74d3216a6' );
            $response   = wp_remote_get( $url, $args );
            $body       = json_decode( $response[ 'body' ], true );

            return $body;
        }

        public function getCity()
        {           
            return $this->geo_location['city'];
        }

        public function getRegion()
        {
            return $this->geo_location['region'];
        }

        private function get_location_from_cookie()
        {
            $location = stripslashes( $_COOKIE['geolocation'] );
            $location = stripslashes( $location );
            $location = ( array )( json_decode( $location, true ) );

            return $location;
        }

    }

    if( class_exists( 'GeoLocation' ) ) {
        $geolocator = new GeoLocation();
    }