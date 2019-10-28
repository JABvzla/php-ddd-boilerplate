<?php

namespace App\Application\Example;

use App\Application\Contracts\Command;

final class HelloWorldCommand implements Command
{
    public function getGreeting()
    {
        return 'Hola Mundo';
    }
}
