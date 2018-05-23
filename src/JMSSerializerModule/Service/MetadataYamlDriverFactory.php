<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\Metadata\Driver\YamlDriver;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class MetadataYamlDriverFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class MetadataYamlDriverFactory implements FactoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        new MetadataDriverFactory(YamlDriver::class);
    }
}
