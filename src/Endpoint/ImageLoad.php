<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Endpoint;

class ImageLoad extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\AmpArtaxEndpoint, \Jane\OpenApiRuntime\Client\Psr7HttplugEndpoint
{
    /**
     * Load a set of images and tags into a repository.

    For details on the format, see [the export image endpoint](#operation/ImageGet).

     *
     * @param string|resource|\Psr\Http\Message\StreamInterface $imagesTarball   Tar archive containing images
     * @param array                                             $queryParameters {
     *
     *     @var bool $quiet Suppress progress details during load.
     * }
     */
    public function __construct($imagesTarball, array $queryParameters = [])
    {
        $this->body = $imagesTarball;
        $this->queryParameters = $queryParameters;
    }

    use \Jane\OpenApiRuntime\Client\AmpArtaxEndpointTrait, \Jane\OpenApiRuntime\Client\Psr7HttplugEndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/images/load';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, \Http\Message\StreamFactory $streamFactory = null): array
    {
        return $this->getSerializedBody($serializer);
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['quiet']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['quiet' => false]);
        $optionsResolver->setAllowedTypes('quiet', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Docker\API\Exception\ImageLoadInternalServerErrorException
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer)
    {
        if (200 === $status) {
            return null;
        }
        if (500 === $status) {
            throw new \Docker\API\Exception\ImageLoadInternalServerErrorException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'));
        }
    }
}
