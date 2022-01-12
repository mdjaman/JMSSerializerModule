<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use RuntimeException;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 * Base ServiceManager factory to be extended
 *
 * @license MIT
 * @link    http://www.doctrine-project.org/
 * @author  Kyle Spraggs <theman@spiffyjr.me>
 */
abstract class AbstractFactory implements FactoryInterface
{
    /**
     * @var \Laminas\Stdlib\AbstractOptions
     */
    protected $options;

    /**
     * Gets options from configuration based on name.
     *
     * @param ContainerInterface $container
     * @param string $key
     * @return \Laminas\Stdlib\AbstractOptions
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function getOptions(ContainerInterface $container, string $key)
    {
        $options = $container->get('Configuration');
        $options = $options['jms_serializer'];
        $options = $options[$key] ?? null;

        if (null === $options) {
            throw new RuntimeException(sprintf(
                'Options with name "%s" could not be found in "jms_serializer".',
                $key
            ));
        }

        $optionsClass = $this->getOptionsClass();
        return new $optionsClass($options);
    }

    /**
     * Get the class name of the options associated with this factory.
     *
     * @abstract
     * @return string
     */
    abstract public function getOptionsClass(): string;
}
