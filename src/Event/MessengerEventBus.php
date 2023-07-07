<?php

namespace Healios\CQRS\Event;

use Symfony\Component\Messenger\MessageBusInterface;

final class MessengerEventBus implements EventBus
{
    private array $events = [];

    public function __construct(
        private readonly MessageBusInterface $eventBus
    ) {
    }

    public function dispatch(Event $event): void
    {
        $this->eventBus->dispatch($event);
        $this->events[] = $event;
    }

    public function getLastEventOfType(string $eventType): ?object
    {
        for ($i = count($this->events) - 1; $i >= 0; --$i) {
            if ($this->events[$i] instanceof $eventType) {
                return $this->events[$i];
            }
        }

        return null;
    }
}
