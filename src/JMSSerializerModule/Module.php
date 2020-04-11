<?php
/*
 * This file is part of the JMSSerializerModule package.
 *
 * (c) Martin Parsiegla <martin.parsiegla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JMSSerializerModule;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Base module for JMS Serializer
 *
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class Module implements ConfigProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }
}
