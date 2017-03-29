<?php

namespace Mywpnonces\src\wpnonce;

class wpnonces 
{

     private $action;

     public function __contruct($action) {
          $this->action = $action;
     }

     public function get_the_action() {

          return $this->action;

     }

     public function createNonce() {
         
          if(!function_exists('wp_create_nonce')) { return false; }

          return wp_create_nonce($this->action);

     }

     public function retriveNonceField() {

          if(!function_exists('wp_nonce_field')) { return false; }

          $name = '_wpnonce';
          $referer = true;
          $echo = true;

          return wp_nonce_field( $this->action, $name, $referer, $echo );

     }

}

?>