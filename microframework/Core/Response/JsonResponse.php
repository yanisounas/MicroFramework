<?php

namespace MicroFramework\Core\Response;

class JsonResponse extends Response
{
    public function __construct(array $content, ?int $statusCode = null, ?string $contentType = "application/json", ?string $charset = null)
    {
        parent::__construct(json_encode($content), $statusCode, $contentType, $charset);
    }
}