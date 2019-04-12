# Google Suggest
![Packagist Version](https://img.shields.io/packagist/v/satoryu/google_suggest.svg)
[![Build Status](https://travis-ci.org/satoryu/google_suggest-php.svg?branch=master)](https://travis-ci.org/satoryu/google_suggest-php)

This package provides a client to fetch suggest words to given phrases from Google.

## Installation

If you use [composer](), run the command as follows:

```sh
composer require satoryu/google_suggest
```

After that, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

## Usage

By `require`ing Composer's autloader, you can `use` `\GoogleSuggest\Client`.
The client class has the method `suggestFor`.

```php
use GoogleSuggest\Client;

$client = new Client;
$suggestions = $client->suggestFor('google')
```

## License

Under the term of MIT License.
