<?php

namespace MicroFramework\Core\Response;

class View extends Response
{
    public function __construct(
        private string $view,
        ?int $statusCode = null,
        ?string $contentType = null)
    {
        parent::__construct(statusCode: $statusCode, contentType: $contentType);
    }

    public function render(?array &$args = null, bool $extract = true)
    {
        if ($extract && $args)
            extract($args);
        include_once $_ENV["VIEW_PATH"] . $this->view;
        return 0;
    }
}