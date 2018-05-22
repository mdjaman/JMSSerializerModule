<?php

namespace JMSSerializerModule\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class MetadataDriverFactory implements FactoryInterface
{

    /**
     * @var string
     */
    protected $driver;

    /**
     * @param string $driver
     */
    public function __construct($driver)
    {
        $this->driver = $driver;
    }


    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $driver = $this->driver;
        $fileLocator = $serviceLocator->get('jms_serializer.metadata.file_locator');
        return new $driver($fileLocator);
    }
}
