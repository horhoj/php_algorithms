<?php

declare(strict_types=1);

namespace App;

class Core
{
    static function makeCore(): self
    {
        return new self();
    }

    public function run(): void
    {
        dd('test');
    }

}
