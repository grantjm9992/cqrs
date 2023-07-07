<?php

namespace Healios\CQRS\Event;

interface EventBus
{
    public function dispatch(Event $event): void;

    public function getLastEventOfType(string $eventType): ?object;
}
