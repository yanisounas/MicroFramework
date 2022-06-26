<?php

namespace MicroFramework\Core\Router\Exceptions;

class RouteNameAlreadyDeclared extends RouterExceptions
{
    public function __construct(string $message = "", int $code = 0)
    {
        parent::__construct($message, $code);
    }
}