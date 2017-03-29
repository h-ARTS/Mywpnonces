<?php

use PHPUnit\Framework\TestCase;
use Mywpnonces\src\wpnonce as test;


class MYWPNonce_Test extends \PHPUnit_Framework_TestCase {

     public function setUp() {

          \WP_Mock::setUp();

          require_once './src/wpnonce.php';

     }

     public function tearDown() {

          \WP_Mock::tearDown();

     }

     public function testCreateNonce() {

          $action        = 'my_action';
          $nonce         = '4832552f';

          $myWPNonce     = new test\MY_WP_Nonces( $action );

          \WP_Mock::userFunction( 'wp_create_nonce', array(

               'times'   =>   1,
               'return'  =>   $nonce

          ) );

          $this->assertEquals($nonce, $myWPNonce->createNonce());

     }

     public function testGetNonceField() {

          $action        = 'my_action';
          $name          = '_wpnonce';
          $nonce         = '4832552f';

          $myWPNonce     = new test\MY_WP_Nonces( $action );

          $nonce_field = '<input type="hidden" id"_wpnonce" name="_wpnonce" value="4832552f" />';

          \WP_Mock::userFunction( 'wp_nonce_field', array(

               'times'   =>   1,
               'return'  =>   '<input type="hidden" id"' . $name . '" name="' . $name . '" value="' . $nonce . '" />'

          ) );

          $this->assertEquals( $nonce_field, $myWPNonce->getNonceField( $name ) );

     }

     public function testVerifyNonce() {

          $action        = 'my_action';
          $nonce         = '4832552f';

          $myWPNonce     = new test\MY_WP_Nonces( $action );

          \WP_Mock::userFunction( 'wp_verify_nonce', array( 

               'times'             =>   3,
               'return_in_order'   =>   array(false, 1, 2)

          ) );

          $this->assertFalse( $myWPNonce->verifyNonce( '3325648f' ) );

          $this->assertEquals( 1, $myWPNonce->verifyNonce( $nonce ) );

          $this->assertEquals( 2, $myWPNonce->verifyNonce( $nonce ) );

     }

     public function testGetNonceUrl() {

          $actionurl     = 'http://www.testweb.ch/wp-admin/post.php?post=1&action=trash';
          $action        = 'my_action';
          $name          = '_wpnonce';
          $nonce         = '4832552f';

          $myWPNonce     = new test\MY_WP_Nonces( $action );

          \WP_Mock::userFunction( 'wp_nonce_url', array( 

               'times'        =>   1,
               'return'       =>   $actionurl . '&' . $name . '=' . $nonce 

          ) );

          $this->assertEquals( 'http://www.testweb.ch/wp-admin/post.php?post=1&action=trash&_wpnonce=4832552f', $myWPNonce->getNonceUrl( $actionurl ) );

     }

     public function testCheckAdminReferer() {

          $action        = 'my_action';
          $query_arg     = '_wpnonce';

          $myWPNonce = new test\MY_WP_Nonces( $action );

          \WP_Mock::userFunction( 'check_admin_referer', array( 

               'times'             =>   3,
               'return_in_order'   =>  array( 1, 2, false )

          ) );
          
          $this->assertFalse($myWPNonce->checkAdminReferer( 'my_query' ) );

          $this->assertEquals(1, $myWPNonce->checkAdminReferer( $query_arg ) );

          $this->assertEquals(2, $myWPNonce->checkAdminReferer( $query_arg ) );


     }

}


?>
