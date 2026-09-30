<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use JMSSerializerModule\Options\Visitors;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 * Class XmlDeserializationVisitorFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class XmlDeserializationVisitorFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $options = $container->get('Configuration');
        $options = new Visitors($options['jms_serializer']['visitors']);

        $xmlOptions = $options->getXml();
        return new XmlDeserializationVisitor(true, $xmlOptions['doctype_whitelist']);
    }
}
