<?php

namespace JMSSerializerModule\Service;

use JMS\Serializer\XmlDeserializationVisitor;
use JMSSerializerModule\Options\Visitors;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class XmlDeserializationVisitorFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class XmlDeserializationVisitorFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return XmlDeserializationVisitor
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $options = $serviceLocator->get('Configuration');
        $options = new Visitors($options['jms_serializer']['visitors']);

        $xmlOptions = $options->getXml();
        $visitor = new XmlDeserializationVisitor(
            $serviceLocator->get('jms_serializer.naming_strategy'),
            $serviceLocator->get('jms_serializer.object_constructor')
        );
        $visitor->setDoctypeWhitelist($xmlOptions['doctype_whitelist']);
        return $visitor;
    }
}