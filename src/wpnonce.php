<?php

namespace Mywpnonces\src\wpnonce;

class MY_WP_Nonces {

     private $action;

     public function __contruct( $action ) {

          $this->action = $action;

     }

     public function get_the_action() {

          return $this->action;

     }

     public function createNonce() {
         
          if( ! function_exists( 'wp_create_nonce' ) ) { return false; }

          return wp_create_nonce( $this->action );

     }

     public function getNonceField( $name = '_wpnonce', $referer = true, $echo = true ) {

          if( ! function_exists( 'wp_nonce_field') || empty( $name ) || !is_string( $name ) ) { return false; }

          return wp_nonce_field( $this->action, $name, $referer, $echo );

     }

     public function verifyNonce( $nonce ) {

          if( ! function_exists( 'wp_verify_nonce') || empty( $nonce ) || !is_string( $nonce ) ) { return false; }

          return wp_verify_nonce( $nonce, $this->action );

     }

     public function getNonceUrl( $actionurl, $name = '_wpnonce') {

          if( ! function_exists( 'wp_nonce_url' ) || empty($actionurl) || !is_string( $actionurl ) ) { return false; }

          return wp_nonce_url( $actionurl, $this->action, $name );

     }

}

?>