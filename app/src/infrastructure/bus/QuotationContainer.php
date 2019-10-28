<?php

namespace App\Infrastructure\Bus;

use App\Application\Bus\Contracts\Container;
use Illuminate\Container\Container as IoC;

final class AppContainer implements Container
{
    private $container;

    public function __construct(IoC $container)
    {
        $this->container = $container;
    }

    public function make($class)
    {
        return $this->container->make($class);
    }
}
