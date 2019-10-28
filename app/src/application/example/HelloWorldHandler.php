<?php

namespace App\Application\Example;

final class HelloWorldHandler
{
    public function __invoke()
    {
        $command = new HelloWorldCommand();

        echo $command->getGreeting();
    }
}
