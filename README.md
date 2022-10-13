<p align="center">
  <img src="https://redx.com.bd/images/new-redx-logo.svg">
</p>

<h1 align="center">Redx Courier Banagladesh</h1>
<p align="center" >
<img src="https://img.shields.io/packagist/dt/codeboxr/redx-courier">
<img src="https://img.shields.io/packagist/stars/codeboxr/redx-courier">
</p>

This is a Laravel/PHP package for [Redx](https://redx.com.bd/) BD Courier System. This package can be used in laravel or without laravel/php projects. You can use this package for headless/rest implementation as well as blade or regular mode development. We created this package while working for a project and thought to made it release for all so that it helps. This package is available as regular php [composer package](https://packagist.org/packages/codeboxr/redx-courier).



## Requirements

- PHP >=7.2
- Laravel >= 6

## Installation

```bash
composer require codeboxr/redx-courier
```

### vendor publish (config)

```bash
php artisan vendor:publish --provider="Codeboxr\RedxCourier\RedxCourierServiceProvider"
```

After publish config file setup your credential. you can see this in your config directory redx.php file

```
 "sandbox"      => env("REDX_SANDBOX", false),
 "access_token" => env("REDX_ACCESS_TOKEN", ""),
```

### Set .env configuration

```
REDX_SANDBOX=true // for production mode use false
REDX_ACCESS_TOKEN=""
```

## Usage

### 1. Get redx delivery area list

```
use Codeboxr\RedxCourier\Facade\RedxCourier

return RedxCourier::area()->list();

```

### 2. Create new store

```
use Codeboxr\RedxCourier\Facade\RedxCourier

return RedxCourier::store()
                        ->create([
                           "name"    => "", //store name
                           "phone"   => "", //store contact person 
                           "area_id" => "",
                           "address" => "",
                        ]);
```

### 3. Get Store List

```
use Codeboxr\RedxCourier\Facade\RedxCourier

return RedxCourier::store()->list();
```

### 4. Store Details

```
use Codeboxr\RedxCourier\Facade\RedxCourier

return RedxCourier::store()->storeDetails($storeId);
```

### 5. Create new parcel

```
use Codeboxr\RedxCourier\Facade\RedxCourier

return RedxCourier::order()
                        ->create([
                            "customer_name"          => "", 
                            "customer_phone"         => "",
                            "delivery_area"          => "", // delivery area name
                            "delivery_area_id"       => "", // area id
                            "customer_address"       => "", 
                            "merchant_invoice_id"    => "",
                            "cash_collection_amount" => "",
                            "parcel_weight"          => "", //parcel weight in gram
                            "instruction"            => "",
                            "value"                  => "", //compensation amount
                            "pickup_store_id"        => "", // store id
                            "parcel_details_json"    => ""
                        ]);
```

### 6. Get Order Details

```
use Codeboxr\RedxCourier\Facade\RedxCourier

return RedxCourier::order()->orderDetails($trackingId); // After successfully create order they given a tracking_id
```

### 7. Order tracking

```
use Codeboxr\RedxCourier\Facade\RedxCourier

return RedxCourier::order()->tracking($trackingId); // After successfully create order they given a tracking_id
```

## Contributing

Contributions to the Redx package are welcome. Please note the following guidelines before submitting your pull
request.

- Follow [PSR-4](http://www.php-fig.org/psr/psr-4/) coding standards.
- Read Redx API documentations first

## License

Redx package is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2022 [Codeboxr](https://codeboxr.com)
