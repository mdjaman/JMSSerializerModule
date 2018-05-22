<?php

namespace JMSSerializerModule\Service;

use JMS\Serializer\JsonSerializationVisitor;
use JMSSerializerModule\Options\Visitors;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class JsonSerializationVisitorFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class JsonSerializationVisitorFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return JsonSerializationVisitor
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Configuration');
        $options = new Visitors($config['jms_serializer']['visitors']);

        $jsonOptions = $options->getJson();
        $visitor = new JsonSerializationVisitor($serviceLocator->get('jms_serializer.naming_strategy'));
        $visitor->setOptions($jsonOptions['options']);
        return $visitor;
    }
}