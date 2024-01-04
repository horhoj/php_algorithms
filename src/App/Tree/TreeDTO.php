<?php

declare(strict_types=1);

namespace App\Tree;

class TreeDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public int|null $parentId,
        /** @var self[] $children */
        public array $children
    ) {
    }

}
