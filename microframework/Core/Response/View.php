<?php

namespace MicroFramework\Core\Response;

class View extends Response
{
    public function __construct(private string $view, ?int $statusCode = null, ?string $contentType = null, ?string $charset = null)
    {
        parent::__construct(statusCode: $statusCode, contentType: $contentType, charset: $charset);
    }

    public function render(?array &$args = null, bool $extract = true)
    {
        if ($extract)
            extract($args);
        include_once $_ENV["VIEW_PATH"] . $this->view;
        return 0;
    }
}