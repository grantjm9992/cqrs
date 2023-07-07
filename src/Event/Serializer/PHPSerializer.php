<?php

namespace App\Domain\Serializer;

use Healios\CQRS\Event\Event\UndefinedEvent;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class PHPSerializer implements SerializerInterface
{
    private NormalizerInterface $objectNormalizer;
    public function __construct(NormalizerInterface $objectNormalizer)
    {
        $this->objectNormalizer = $objectNormalizer;
    }
    public function decode(array $encodedEnvelope): Envelope
    {
        try {
            return $this->objectNormalizer->denormalize($encodedEnvelope, Envelope::class);
        } catch (\Exception $exception) {
            return new Envelope(new UndefinedEvent());
        }
    }
    public function encode(Envelope $envelope): array
    {
        return $this->objectNormalizer->normalize($envelope);
    }
}