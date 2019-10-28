<?php

namespace App\Application\Bus\Contracts;

interface Container
{
    public function make($class);
}
