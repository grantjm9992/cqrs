<?php

namespace Healios\CQRS\Event\Event;

use Healios\CQRS\Event\Event;

class UndefinedEvent extends AbstractEvent implements Event
{
    public function __construct() {}

    public static function getEventName(): string
    {
        return self::class;
    }
}