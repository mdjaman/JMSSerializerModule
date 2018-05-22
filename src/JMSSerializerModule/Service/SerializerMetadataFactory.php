<?php

namespace JMSSerializerModule\Service;

use JMSSerializerModule\Options\Metadata;
use Metadata\MetadataFactory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class SerializerMetadataFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class SerializerMetadataFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return MetadataFactory
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Configuration');
        $metadata = new Metadata($config['jms_serializer']['metadata']);
        $lazyLoadingDriver = $serviceLocator->get('jms_serializer.metadata.lazy_loading_driver');
        return new MetadataFactory($lazyLoadingDriver, 'Metadata\ClassHierarchyMetadata', $metadata->getDebug());
    }
}