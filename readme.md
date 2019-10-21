![License: MIT](https://img.shields.io/badge/License-WTFPL-blue.svg)
# Laravel Instagram API 

Laravel integration for the [Instagram private API](https://github.com/mgp25/Instagram-API/) package.


# Install

`composer require michelmelo/laravel-instagram-api`

Add provider into your `app.php` config:

```
'providers' => [
    ...
    
    MichelMelo\InstagramApi\LaravelInstagramApiProvider::class,
    
]

```

Add alias into your `app.php` config:
```
'alias' => [
    ...
    
    'Instagram'    => MichelMelo\InstagramApi\Facades\InstagramApi::class,
    
]

```

# Configuration

```shell
php artisan vendor:publish --provider="MichelMelo\InstagramApi\LaravelInstagramApiProvider" --tag=config
```

Edit `config/mm-instagram-api.php`.

# Usage

Methods same [Instagram Private API](https://github.com/mgp25/Instagram-API/) package.

Use 
```\Instagram::setUser($username, $password)``` 

instead 

```
$instagram = new Instagram($debug);
$instagram->setUser($username, $password);
```
