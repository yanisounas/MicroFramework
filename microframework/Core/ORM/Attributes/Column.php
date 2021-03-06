<?php

namespace MicroFramework\Core\ORM\Attributes;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Column
{
    public function __construct(private readonly ?string $columnName = null) {}

    public function getTableName(): ?string {return $this->columnName;}
}