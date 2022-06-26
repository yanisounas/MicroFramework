<?php

namespace MicroFramework\Core\Response;

class Response
{
    public function __construct(
        public ?string $content = null,
        private readonly ?int    $statusCode = null,
        private readonly ?string $contentType = null,
        private readonly ?string $charset = null)
    {
        if ($this->statusCode)
            http_response_code($this->statusCode);

        if($this->contentType)
            header("Content-Type: $this->contentType;");

        if($this->contentType)
            header("Content-Type: $this->charset;");

        if (is_string($this->content))
            echo $this->content;

    }
}

