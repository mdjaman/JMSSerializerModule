<?php

namespace JMSSerializerModule\Service;

use JMSSerializerModule\Options\Metadata;
use Metadata\Driver\FileLocator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class MetadataFileLocatorFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class MetadataFileLocatorFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return FileLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Configuration');
        $metadata = new Metadata($config['jms_serializer']['metadata']);
        $directories = array();

        foreach ($metadata->getDirectories() as $directory) {
            if (!isset($directory['path'], $directory['namespace_prefix'])) {
                throw new \RuntimeException(
                    sprintf('The directory must have the attributes "path" and "namespace_prefix, "%s" given.',
                        implode(', ', array_keys($directory))
                    )
                );
            }
            $directories[rtrim($directory['namespace_prefix'], '\\')] =
                rtrim($directory['path'], '\\/');
        }

        return new FileLocator($directories);
    }
}