<?php

namespace JMSSerializerModule\Service;

use JMS\Serializer\XmlSerializationVisitor;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class XmlSerializationVisitorFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class XmlSerializationVisitorFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return XmlSerializationVisitor
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new XmlSerializationVisitor($serviceLocator->get('jms_serializer.naming_strategy'));
    }
}