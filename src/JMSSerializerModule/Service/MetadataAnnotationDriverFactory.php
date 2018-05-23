<?php

namespace JMSSerializerModule\Service;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\Common\Annotations\IndexedReader;
use Interop\Container\ContainerInterface;
use JMS\Serializer\Metadata\Driver\AnnotationDriver;
use JMSSerializerModule\Options\Metadata;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class MetadataDriverChainFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class MetadataAnnotationDriverFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AnnotationDriver|object
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Configuration');
        $metadata = new Metadata($config['jms_serializer']['metadata']);

        $annotationReader = new AnnotationReader();
        $cachedReader = new CachedReader(
            new IndexedReader($annotationReader),
            $container->get($metadata->getAnnotationCache())
        );
        return new AnnotationDriver($cachedReader);
    }
}