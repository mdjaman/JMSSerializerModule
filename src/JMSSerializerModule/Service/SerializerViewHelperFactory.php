<?php

namespace JMSSerializerModule\Service;

use JMSSerializerModule\View\Serializer;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class SerializerViewHelperFactory
 * @package JMSSerializerModule\Service
 * @author Marcel DJAMAN <marceldjaman@gmail.com>
 */
class SerializerViewHelperFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $helpers)
    {
        $sm = $helpers->getServiceLocator();
        return new Serializer($sm->get('jms_serializer.serializer'));
    }
}
