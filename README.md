
# CCAvenue Payment Gateway PHP

A simple PHP extension for CCAvenue(www.ccavenue.com) payment gateway integration in Laravel


## Installation

Require this package in your composer.json and update composer. This will download the package.

    composer require samdoit/ccavenue

### Laravel

After updating composer, add the ServiceProvider to the providers array in config/app.php

    Samdoit\CCAvenue\CCAvenueServiceProvider::class,
    
packege auto discovery available for laravel version 7.3 or later

After adding ServiceProvider, Run the command 
        
        php artisan vendor:publish