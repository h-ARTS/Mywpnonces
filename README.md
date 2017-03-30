# MYWPNonces by Hanan Mufti

[![Build Status](https://travis-ci.org/h-ARTS/Mywpnonces.svg?branch=master)](https://travis-ci.org/h-ARTS/Mywpnonces)

MYWPNonces is a Library with WordPress Nonce functions in object-oriented way.

## How to use

Declare a new instance:
```php
$myNonces = new MY_WP_Nonces( 'my_nonce_action' );
```

### Creating Nonce

```php
$myNonces->createNonce();
```

**Help:** [wp_create_nonce()](https://developer.wordpress.org/reference/functions/wp_create_nonce)

---------------

### Creating Nonce Field

```php
$myNonce->getNonceField( 'the_name_of_nonce', true, true );
```
*3 Parameters are optional*

**Help:** [wp_nonce_field()](https://developer.wordpress.org/reference/functions/wp_nonce_field)

---------------

### Verifying Nonce

```php
$myNonce->verifyNonce( $nonce );
```
*1 Parameter is required!*

**Help:** [wp_verify_nonce()](https://developer.wordpress.org/reference/functions/wp_verify_nonce)

---------------

### Creating Nonce Url *with given parameter*

```php
$target_url = 'https://www.example.com/wp-admin/trash-something';
$myNonce->getNonceUrl( $target_url, 'the_name_of_nonce' );
```
*First parameter is required and second is optional*

**Help:** [wp_nonce_url()](https://developer.wordpress.org/reference/functions/wp_nonce_url)

---------------

### Check if the referred user has valid nonce

```php
$query_arg = '_security';
$myNonce->checkAdminReferer( $query_arg );
```
*1 Parameter is optional*

**Help:** [check_admin_referer()](https://developer.wordpress.org/reference/functions/check_admin_referer)

--------------

### Check if Ajax Request has a valid nonce

```php
$query_arg = '_security';
$die = true;
$myNonce->checkAjaxReferer( $query_arg, $die );
```
*2 Parameters are optional*

**Help:** [check_ajax_referer()](https://developer.wordpress.org/reference/functions/check_ajax_referer)

--------------

### Returning "Are you sure?" Message

```php
$myNonce->areYouSure();
```

**Help:** [wp_nonce_ays()](https://developer.wordpress.org/reference/functions/wp_nonce_ays)

## Whats missing currently?

- Code Documentation
