<?php

namespace JMSSerializerModule\Service;

use JMS\Serializer\Handler\DateHandler;
use JMSSerializerModule\Options\Handlers;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class DateTimeHandlerFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class DateTimeHandlerFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return DateHandler
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $options = $serviceLocator->get('Configuration');
        $handlers = new Handlers($options['jms_serializer']['handlers']);
        $dateTimeOptions = $handlers->getDatetime();
        return new DateHandler($dateTimeOptions['default_format'], $dateTimeOptions['default_timezone']);
    }
}