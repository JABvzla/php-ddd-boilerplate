<?php

namespace App\Infrastructure;

use App\Infrastructure\Bus\Contracts\CommandBus;
use App\Application\Contracts\Command;
use App\Infrastructure\Bus\AppContainer;

final class AppCommandBus implements CommandBus
{
    private const COMMAND_PREFIX = 'Command';
    private const HANDLER_PREFIX = 'Handler';

    private $container;

    public function __construct(AppContainer $container)
    {
        $this->container = $container;
    }

    public function execute($command)
    {
        return $this->resolverHandler($command)->__invoke($command);
    }

    private function resolverHandler(Command $command)
    {
        return $this->container->make($this->getHandlerClass($command));
    }

    private function getHandlerClass(Command $command): string
    {
        return str_replace(
            self::COMMAND_PREFIX,
            self::HANDLER_PREFIX,
            get_class($command)
        );
    }
}
