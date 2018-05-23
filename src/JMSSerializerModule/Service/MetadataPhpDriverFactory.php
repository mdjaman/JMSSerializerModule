<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\Metadata\Driver\PhpDriver;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class MetadataPhpDriverFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class MetadataPhpDriverFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return MetadataDriverFactory
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        new MetadataDriverFactory(PhpDriver::class);
    }
}
