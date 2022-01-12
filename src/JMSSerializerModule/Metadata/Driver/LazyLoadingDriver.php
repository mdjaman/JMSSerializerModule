<?php

namespace JMSSerializerModule\Metadata\Driver;

use Interop\Container\ContainerInterface;
use Metadata\ClassMetadata;
use Metadata\Driver\DriverInterface;

/**
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class LazyLoadingDriver implements DriverInterface
{
    /**
     * @var ContainerInterface
     */
    private ContainerInterface $container;

    /**
     * @var string
     */
    private string $realDriverId;

    /**
     * LazyLoadingDriver constructor.
     * @param ContainerInterface $container
     * @param $realDriverId
     */
    public function __construct(ContainerInterface $container, $realDriverId)
    {
        $this->container = $container;
        $this->realDriverId = $realDriverId;
    }


    /**
     * {@inheritdoc}
     */
    public function loadMetadataForClass(\ReflectionClass $class): ?ClassMetadata
    {
        return $this->container->get($this->realDriverId)->loadMetadataForClass($class);
    }
}
