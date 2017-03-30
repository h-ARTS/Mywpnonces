# MYWPNonces by Hanan Mufti

[![Build Status](https://travis-ci.org/h-ARTS/Mywpnonces.svg?branch=master)](https://travis-ci.org/h-ARTS/Mywpnonces)

MYWPNonces is a Library with WordPress Nonce functions in object-oriented way.

## How to use

Declare a new instance:
```php
$myNonces = new MY_WP_Nonces( 'myAction' );
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
*Parameters are optional*

**Help:** [wp_nonce_field()](https://developer.wordpress.org/reference/functions/wp_nonce_field)

---------------

### Verifying Nonce

```php
$myNonce->verifyNonce( $nonce );
```
*Parameter is required!*

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

## Whats missing currently?

- Code Documentation
