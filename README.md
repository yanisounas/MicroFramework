
# MicroFramework

A Micro Framework in PHP 8


Usage/Examples
==================

File Architecture
-----------------

First thing first you have to create your app folder: 

    .
    ├── app                              
    ├── microframework
    ├── index.php
    ├── .htaccess
    ├── .env
    ├── .env.exemple
    ├── ...
    




See the .env.exemple to create your own .env.



Controllers
------------
Next you need to create a new controller in app/Controller. I'll call mine "HomeController".

    .
    ├── app                         
        ├── Controller    
            ├── HomeController.php
    ├── microframework
    ├── index.php
    ├── .htaccess
    ├── .env
    ├── .env.exemple
    ├── ...


Put this following code:
```php

namespace App\Controller;

use MicroFramework\Core\AbstractClass\Controller;
use MicroFramework\Core\Response\Response;
use MicroFramework\Core\Router\Attributes\Route;

class HomeController extends Controller
{
    #[Route("/", routeName: "home.home")]
    public function home()
    {
        return new Response("Hello World");
    }
}

```

WebApp
------
Finally you can create a new WebApp in index.php:

```php
require "vendor/autoload.php";

$app = new \MicroFramework\WebApp(__DIR__, \App\Controller\HomeController::class);

$app->start();
```

Go to your favorite browser and try it.
