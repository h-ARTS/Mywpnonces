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

          $nonce_field = '<input type="hidden" id="_wpnonce" name="_wpnonce" value="4832552f" />';

          \WP_Mock::userFunction( 'wp_nonce_field', array(

               'times'   =>   1,
               'return'  =>   sprintf( '<input type="hidden" id="%s" name="%s" value="%s" />', $name, $name, $nonce )

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

          $this->assertFalse( $myWPNonce->verifyNonce('something') );

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
               'return'       =>   sprintf( $actionurl . '&%s=%s', $name, $nonce )

          ) );

          $this->assertEquals( sprintf( $actionurl . '&%s=%s', $name, $nonce ), $myWPNonce->getNonceUrl( $actionurl ) );

     }

     public function testCheckAdminReferer() {

          $action        = 'my_action';
          $query_arg     = '_wpnonce';

          $myWPNonce     = new test\MY_WP_Nonces( $action );

          \WP_Mock::userFunction( 'check_admin_referer', array( 

               'times'    =>   1,
               'return'   =>  true

          ) );

          $this->assertTrue( $myWPNonce->checkAdminReferer( $query_arg ) );


     }

     public function testCheckAjaxReferer() {

          $action        = 'my_action';
          $query_arg     = '_wpnonce';

          $myWPNonce     = new test\MY_WP_Nonces( $action );

          \WP_Mock::userFunction( 'check_ajax_referer', array( 

               'times'    =>   1,
               'return'   =>   true

          ) );

          $this->assertTrue( $myWPNonce->checkAjaxReferer( $query_arg ) );

     }

     public function testAreYouSure() {

          $action        = 'my_action';

          $myWPNonce     = new test\MY_WP_Nonces( $action );

          \WP_Mock::userFunction( 'wp_nonce_ays', array( 

               'times'   =>   1,
               'return'  =>   true

          ) );

          $this->assertTrue( $myWPNonce->areYouSure() );

     }

}


?>
