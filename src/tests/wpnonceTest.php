<?php

use PHPUnit\Framework\TestCase;
use Mywpnonces\src\wpnonce as test;


class MYWPNonceTest extends \PHPUnit_Framework_TestCase
{

     public function setUp() {
          \WP_Mock::setUp();
          require_once './src/wpnonce.php';
     }

     public function tearDown() {
          \WP_Mock::tearDown();
     }

     public function testCreateNonce() {

          $action = 'my_action';
          $nonce = '4832552f';

          $myWPNonce = new test\wpnonces($action);

          \WP_Mock::userFunction('wp_create_nonce', array(

               'times'   =>   1,
               'return'  =>   $nonce

          ) );

          $this->assertEquals($nonce, $myWPNonce->createNonce());

     }

     public function testRetriveNonceField() {

          $action = 'my_action';
          $name = '_wpnonce';
          $referer = true;
          $echo = true;
          $nonce = '4832552f';

          $nonce_field = '<input type="hidden" id"_wpnonce" name="_wpnonce" value="4832552f" />';

          $myWPNonce = new test\wpnonces($action, $name, $referer, $echo);

          \WP_Mock::userFunction('wp_nonce_field', array(

               'times'   =>   1,
               'return'  =>   '<input type="hidden" id"' . $name . '" name="' . $name . '" value="' . $nonce . '" />'

          ) );

          $this->assertEquals($nonce_field, $myWPNonce->retriveNonceField($name));

     }

}


?>
