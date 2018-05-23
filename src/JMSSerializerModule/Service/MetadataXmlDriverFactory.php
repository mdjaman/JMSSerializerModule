<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\Metadata\Driver\XmlDriver;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class MetadataXmlDriverFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class MetadataXmlDriverFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        new MetadataDriverFactory(XmlDriver::class);
    }
}
