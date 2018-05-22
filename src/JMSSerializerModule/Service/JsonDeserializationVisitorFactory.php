<?php

namespace JMSSerializerModule\Service;

use JMS\Serializer\JsonDeserializationVisitor;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class JsonDeserializationVisitorFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class JsonDeserializationVisitorFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return JsonDeserializationVisitor
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new JsonDeserializationVisitor(
            $serviceLocator->get('jms_serializer.naming_strategy'),
            $serviceLocator->get('jms_serializer.object_constructor')
        );
    }
}