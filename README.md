AbysKit
======

Description
-----------
Multi language dashboard package for <a href="https://laravel.com/">Laravel</a> framework 

1) After creating your new Laravel application you can include the AbysKit package with the following command:

```
composer require abyskit/dashboard
```
2) Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

3) Add the AbysKit service provider to the config/app.php file in the providers array:

```
'providers' => [
    // Laravel Framework Service Providers...
    //...
    
    // Package Service Providers
    AbysKit\Providers\AbysKitProvider::class,
    // ...
    
    // Application Service Providers
    // ...
],
```