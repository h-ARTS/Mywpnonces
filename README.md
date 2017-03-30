# MYWPNonces by Hanan Mufti

[![Build Status](https://travis-ci.org/h-ARTS/Mywpnonces.svg?branch=master)](https://travis-ci.org/h-ARTS/Mywpnonces)

MYWPNonces is a Library with WordPress Nonce functions in object-oriented way.

## How to use

Declare a new instance:
```php
$myNonces = new MY_WP_Nonces( 'myAction' );
```

#### Creating Nonce

```php
$myNonces->createNonce();
```

#### Creating a Nonce Field
```php
$myNonce->getNonceField( 'the_name_of_nonce', true , true );
```

## Whats missing currently?

- Code Documentation
