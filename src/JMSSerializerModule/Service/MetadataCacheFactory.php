<?php

namespace JMSSerializerModule\Service;

use Interop\Container\ContainerInterface;
use Metadata\Cache\FileCache;
use RuntimeException;

/**
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class MetadataCacheFactory extends AbstractFactory
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return FileCache|mixed|null|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var $options \JMSSerializerModule\Options\Metadata */
        $options = $this->getOptions($container, 'metadata');
        if ($options->getCache() == 'none') {
            return null;
        } elseif ($options->getCache() == 'file') {
            $fileCache = $options->getFileCache();
            $dir = $fileCache['dir'];
            if (!file_exists($dir)) {
                if (!$rs = @mkdir($dir, 0777, true)) {
                    throw new RuntimeException(sprintf('Could not create cache directory "%s".', $dir));
                }
            }
            return new FileCache($dir);
        }

        return $container->get($options->getCache());
    }

    /**
     * {@inheritDoc}
     */
    public function getOptionsClass()
    {
        return 'JMSSerializerModule\Options\Metadata';
    }

}
