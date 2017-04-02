<?php


/**
 * MYWPNonces is a Library of WordPress Nonce functions in object-oriented environment
 *
 * This is a Library to provide an easy to use WordPress Nonce 
 * functions for the sake of simplicity.
 *
 * @link https://github.com/h-ARTS/Mywpnonces
 *
 * @since 0.0.1
 *
 * @package MYWPNonces
 */

namespace Mywpnonces\src\wpnonce;



/**
 * MY_WP_Nonces class.
 *
 * @since 0.0.1
 */
class MY_WP_Nonces {
	
	/**
     * Action name
     *
     * @access  private
     * @var     string  $action     Name of the action.
     */
	private $action;
	
    /**
     * Initializes the name of the action.
     *
     * @param   string  $action     Name of the action.
     */
	public function __contruct( $action ) {
		
		$this->action = $action;
		
	}
	
    /**
     * Gets the private action variable
     *
     * @return  string  private action variable.
     */
	public function the_action() {
		
		return $this->action;
		
	}
	
    /**
     * Generates and returns a nonce.
     *
     * @link https://codex.wordpress.org/Function_Reference/wp_create_nonce
     *
     * @return  string  Nonce generated.
     */
	public function createNonce() {
		
		if( ! function_exists( 'wp_create_nonce' ) ) {
			return false;
		}
		
		return wp_create_nonce( $this->action );
		
	}
	
    /**
     * Creates a hidden nonce input field for forms
     *
     * @link https://developer.wordpress.org/reference/functions/wp_nonce_field
     *
     * @param   string  $name       Specific nonce name.
     * @param   bool    $referer    Sets the referer field for validation.
     * @param   bool    $echo       Either it displays the hidden form field or it returns.
     *
     * @return  string|bool         Hidden Input field with nonce as HTML markup | false
     */
	public function getNonceField( $name = '_wpnonce', $referer = true, $echo = true ) {
		
		if( ! function_exists( 'wp_nonce_field') || empty( $name ) || !is_string( $name ) ) {
			return false;
		}
		
		return wp_nonce_field( $this->action, $name, $referer, $echo );
		
	}
	
    /**
     * Verifies the nonce with time limit.
     *
     * @link https://developer.wordpress.org/reference/functions/wp_verify_nonce
     *
     * @param   string      $nonce  The nonce used in the form.
     *
     * @return  bool|int            Returns false if it's invalid or an integer between 1-2 if it's valid.
     */
	public function verifyNonce( $nonce ) {
		
		if( ! function_exists( 'wp_verify_nonce') || empty( $nonce ) || !is_string( $nonce ) ) {
			return false;
		}
		
		return wp_verify_nonce( $nonce, $this->action );
		
	}
	
    /**
     * Returns a URL with nonce added.
     *
     * @link https://developer.wordpress.org/reference/functions/wp_nonce_url
     *
     * @param   string  $actionurl  Target url as a string.
     * @param   string  $name       Specific nonce name.
     *
     * @return  string              URL with generated nonce added.
     */
	public function getNonceUrl( $actionurl, $name = '_wpnonce') {
		
		if( ! function_exists( 'wp_nonce_url' ) || empty($actionurl) || !is_string( $actionurl ) ) {
			return false;
		}
		
		return wp_nonce_url( $actionurl, $this->action, $name );
		
	}
	
	public function checkAdminReferer( $query_arg = '_wpnonce' ) {
		
		if( ! function_exists( 'check_admin_referer' ) ) {
			return false;
		}
		
		return check_admin_referer( $this->action, $query_arg );
		
	}
	
	public function checkAjaxReferer( $query_arg = false, $die = true ) {
		
		if( ! function_exists( 'check_ajax_referer' ) ) {
			return false;
		}
		
		return check_ajax_referer( $this->action, $query_arg, $die );
		
	}
	
	public function areYouSure() {
		
		if( ! function_exists( 'wp_nonce_ays' ) ) {
			return false;
		}
		
		return wp_nonce_ays( $this->action );
		
	}
	
}

?>