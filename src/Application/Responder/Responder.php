<?php

declare(strict_types=1);

namespace App\Application\Responder;

abstract class Responder
{
    /**
     * @return array<string, mixed>
     */
    abstract public function toArray(): array;
}
