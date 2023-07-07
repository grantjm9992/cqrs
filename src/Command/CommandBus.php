<?php

namespace Healios\CQRS\Command;

interface CommandBus
{
    public function dispatch(Command $command): void;
}
