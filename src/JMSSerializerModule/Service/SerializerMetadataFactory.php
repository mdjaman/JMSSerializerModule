<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMSSerializerModule\Options\Metadata;
use Metadata\MetadataFactory;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class SerializerMetadataFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class SerializerMetadataFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Configuration');
        $metadata = new Metadata($config['jms_serializer']['metadata']);
        $lazyLoadingDriver = $container->get('jms_serializer.metadata.lazy_loading_driver');
        return new MetadataFactory(
            $lazyLoadingDriver,
            'Metadata\ClassHierarchyMetadata',
            $metadata->getDebug()
        );
    }
}
