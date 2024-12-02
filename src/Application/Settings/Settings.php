<?php

declare(strict_types=1);

namespace App\Application\Settings;

class Settings implements SettingsInterface
{
    /**
     * @param array<mixed, mixed> $settings
     */
    public function __construct(readonly private array $settings)
    {
    }

    /**
     * @return mixed
     */
    public function get(string $key = '')
    {
        return (empty($key)) ? $this->settings : $this->settings[$key];
    }
}
