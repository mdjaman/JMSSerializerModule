<?php

namespace JMSSerializerModule\Service;

use JMS\Serializer\YamlSerializationVisitor;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class YamlSerializationVisitorFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class YamlSerializationVisitorFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $namingStrategy = $serviceLocator->get('jms_serializer.naming_strategy');
        return new YamlSerializationVisitor($namingStrategy);
    }
}
