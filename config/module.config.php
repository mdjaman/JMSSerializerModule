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

use JMS\Serializer\Metadata\Driver\PhpDriver;
use JMS\Serializer\Metadata\Driver\XmlDriver;
use JMS\Serializer\Metadata\Driver\YamlDriver;
use JMSSerializerModule\Service\SerializerViewHelperFactory;

return array(
    'service_manager' => [
        'aliases' => array(
            'jms_serializer.metadata_driver' => 'jms_serializer.metadata.chain_driver',
            'jms_serializer.object_constructor' => 'jms_serializer.unserialize_object_constructor',
            'jms_serializer.metadata.yaml_driver' => YamlDriver::class,
            'jms_serializer.metadata.xml_driver' => XmlDriver::class,
            'jms_serializer.metadata.php_driver' => PhpDriver::class,
        ),
        'factories' => array(
            'jms_serializer.handler_registry' => Service\HandlerRegistryFactory::class,
            'jms_serializer.datetime_handler' => Service\DateTimeHandlerFactory::class,
            'jms_serializer.event_dispatcher' => Service\EventDispatcherFactory::class,
            'jms_serializer.metadata.cache' => Service\MetadataCacheFactory::class,
            YamlDriver::class => Service\MetadataDriverFactory::class,
            XmlDriver::class => Service\MetadataDriverFactory::class,
            PhpDriver::class => Service\MetadataDriverFactory::class,
            'jms_serializer.metadata.file_locator' => Service\MetadataFileLocatorFactory::class,
            'jms_serializer.metadata.annotation_driver' => Service\MetadataAnnotationDriverFactory::class,
            'jms_serializer.metadata.chain_driver' => Service\MetadataDriverChainFactory::class,
            'jms_serializer.metadata.lazy_loading_driver' => Service\LazyLoadingDriverFactory::class,
            'jms_serializer.metadata_factory' => Service\SerializerMetadataFactory::class,
            'jms_serializer.camel_case_naming_strategy' => Service\CamelCaseNamingStrategyFactory::class,
            'jms_serializer.serialized_name_annotation_strategy' => Service\SerializedNameAnnotationStrategyFactory::class,
            'jms_serializer.naming_strategy' => Service\NamingStrategyFactory::class,
            'jms_serializer.json_serialization_visitor' => Service\JsonSerializationVisitorFactory::class,
            'jms_serializer.json_deserialization_visitor' => Service\JsonDeserializationVisitorFactory::class,
            'jms_serializer.xml_serialization_visitor' => Service\XmlSerializationVisitorFactory::class,
            'jms_serializer.xml_deserialization_visitor' => Service\XmlDeserializationVisitorFactory::class,
            'jms_serializer.yaml_serialization_visitor' => Service\YamlSerializationVisitorFactory::class,
            'jms_serializer.serializer' => Service\SerializerFactory::class,
        ),
        'invokables' => array(
            'jms_serializer.identical_naming_strategy' => \JMS\Serializer\Naming\IdenticalPropertyNamingStrategy::class,
            'jms_serializer.unserialize_object_constructor' => \JMS\Serializer\Construction\UnserializeObjectConstructor::class,
            'jms_serializer.array_collection_handler' => \JMS\Serializer\Handler\ArrayCollectionHandler::class,
            'jms_serializer.doctrine_proxy_subscriber' => \JMS\Serializer\EventDispatcher\Subscriber\DoctrineProxySubscriber::class,
        ),
    ],
    'view_helpers' => [
        'factories' => array(
            'jmsSerializer' => SerializerViewHelperFactory::class,
        ),
    ],
);
