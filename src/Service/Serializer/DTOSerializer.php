<?php

namespace App\Service\Serializer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Custom Serializer Class
 */
class DTOSerializer implements SerializerInterface
{
    private SerializerInterface $serializer;

    public function __construct()
    {
        // change the keys from camel case to snake case
        $this->serializer = new Serializer(
            [new ObjectNormalizer(nameConverter: new CamelCaseToSnakeCaseNameConverter())],
            [new JsonEncoder()]
        );
    }

    /**
     * @param mixed $data
     * @param string $format
     * @param array $context
     * @return string
     */
    public function serialize(mixed $data, string $format, array $context = []): string
    {
        return $this->serializer->serialize($data, $format, $context);
    }

    /**
     * @param mixed $data
     * @param string $type
     * @param string $format
     * @param array $context
     * @return mixed
     */
    public function deserialize(mixed $data, string $type, string $format, array $context = []): mixed
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }
}
