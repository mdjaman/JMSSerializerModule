<?php

namespace JMSSerializerModule\Service;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\Common\Annotations\IndexedReader;
use JMS\Serializer\Metadata\Driver\AnnotationDriver;
use JMSSerializerModule\Options\Metadata;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class MetadataDriverChainFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class MetadataAnnotationDriverFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return AnnotationDriver|mixed
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Configuration');
        $metadata = new Metadata($config['jms_serializer']['metadata']);

        $annotationReader = new AnnotationReader();
        $cachedReader = new CachedReader(
            new IndexedReader($annotationReader),
            $serviceLocator->get($metadata->getAnnotationCache())
        );
        return new AnnotationDriver($cachedReader);
    }
}