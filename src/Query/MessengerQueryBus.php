<?php

namespace Healios\CQRS\Query;

use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class MessengerQueryBus implements QueryBus
{
    public function __construct(
        private readonly MessageBusInterface $queryBus
    ) {
    }

    public function query(Query $query)
    {
        $envelope = $this->queryBus->dispatch($query);
        return $envelope->last(HandledStamp::class)->getResult();
    }
}
