<?php

use PHPUnit\Framework\TestCase;

class MYWPNonceTest extends \PHPUnit_Framework_TestCase
{

     public function setUp() {
          \WP_Mock::setUp();
     }

     public function tearDown() {
          \WP_Mock::tearDown();
     }

     public function testReturnsTrue() {
          
          $this->assertTrue(true);

     }

}


?>