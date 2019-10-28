<?php

namespace App\Http\Controllers;

use App\Application\Example\HelloWorldCommand;
use App\Infrastructure\Bus\Contracts\CommandBus;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function greeting()
    {
        $command = new HelloWorldCommand();

        $this->commandBus->execute($command);

        return 'Hello from controller!';
    }
}
