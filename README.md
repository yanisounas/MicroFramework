
# MicroFramework
A Micro Framework in PHP 8.

I just started it, and I'm not an experienced developer, this code is not perfect. So this framework is not intended to be used other than locally.

Usage/Examples
==================

File Architecture
-----------------

First things first you need to create your app folder: 

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

use MicroFramework\Core\Response\Response;
use MicroFramework\Core\Router\Attributes\Route;

class HomeController
{
    #[Route("/")]
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


Views
------
To create a view, make sure your .env file contains `VIEW_PATH="app/View"`.

Then create a view in app/View

    .
    ├── app                         
        ├── Controller    
            ├── HomeController.php
        ├── View
            ├── home.php
    ├── microframework
    ├── index.php
    ├── .htaccess
    ├── .env
    ├── .env.exemple
    ├── ...


home.php:
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>Hello world!</h1>
</body>
</html>
```

Then go to your HomeController and change some code:
```php
namespace App\Controller;

use MicroFramework\Core\AbstractClass\Controller;
use MicroFramework\Core\Router\Attributes\Route;

class HomeController extends Controller
{
    #[Route("/")]
    public function home()
    {
        return $this->view("home.php");
    }
}
```

