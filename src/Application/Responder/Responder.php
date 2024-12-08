<?php

declare(strict_types=1);

namespace App\Application\Responder;

interface Responder
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
