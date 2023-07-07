<?php

namespace Healios\CQRS\Event\Event;

use Symfony\Contracts\EventDispatcher\Event;

abstract class AbstractEvent extends Event
{
    abstract public static function getEventName(): string;
}