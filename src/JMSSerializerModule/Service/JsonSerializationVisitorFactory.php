<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use JMSSerializerModule\Options\Visitors;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class JsonSerializationVisitorFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class JsonSerializationVisitorFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return JsonSerializationVisitor|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Configuration');
        $options = new Visitors($config['jms_serializer']['visitors']);

        $jsonOptions = $options->getJson();
        $visitor = new JsonSerializationVisitor($container->get('jms_serializer.naming_strategy'));
        $visitor->setOptions($jsonOptions['options']);
        return $visitor;
    }
}
