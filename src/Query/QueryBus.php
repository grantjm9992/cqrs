<?php

namespace Healios\CQRS\Query;

interface QueryBus
{
    public function query(Query $query);
}
