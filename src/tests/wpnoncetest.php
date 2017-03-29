<?php

use PHPUnit\Framework\TestCase;
use Mywpnonces\src\wpnonce as wpnoncefile;


class MYWPNonceTest extends \PHPUnit_Framework_TestCase
{

     public function setUp() {
          \WP_Mock::setUp();
     }

     public function tearDown() {
          \WP_Mock::tearDown();
     }

     public function testCreateNonce() {

          $action = 'my_action';
          $nonce = '4832552f';

          $myWPNonce = new wpnoncefile\wpnonces($action);

          \WP_Mock::userFunction('wp_create_nonce', array(

               'times'   =>   1,
               'return'  =>   $nonce

          ) );

          $this->assertEquals($nonce, $myWPNonce->createNonce());

     }

}


?>