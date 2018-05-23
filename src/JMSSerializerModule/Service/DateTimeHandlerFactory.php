<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use JMS\Serializer\Handler\DateHandler;
use JMSSerializerModule\Options\Handlers;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class DateTimeHandlerFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class DateTimeHandlerFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DateHandler|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $options = $container->get('Configuration');
        $handlers = new Handlers($options['jms_serializer']['handlers']);
        $dateTimeOptions = $handlers->getDatetime();
        return new DateHandler($dateTimeOptions['default_format'], $dateTimeOptions['default_timezone']);
    }
}
