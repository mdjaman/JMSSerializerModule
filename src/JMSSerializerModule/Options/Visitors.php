<?php

namespace JMSSerializerModule\Options;

use Laminas\Stdlib\AbstractOptions;

/**
 * HandlerRegistry options
 *
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class Visitors extends AbstractOptions
{

    /**
     * Turn off strict options mode
     */
    protected $__strictMode__ = false;

    /**
     * @var array
     */
    protected array $serialization = [
        'json' => 'jms_serializer.json_serialization_visitor',
        'xml' => 'jms_serializer.xml_serialization_visitor',
        'yml' => 'jms_serializer.yaml_serialization_visitor',
    ];

    /**
     * @var array
     */
    protected array $deserialization = [
        'json' => 'jms_serializer.json_deserialization_visitor',
        'xml' => 'jms_serializer.xml_deserialization_visitor',
    ];

    /**
     * Contains options for json visitor.
     *
     * @var array
     */
    protected array $json = [
        'options' => 0,
    ];

    /**
     * Contains options for xml visitor.
     *
     * @var array
     */
    protected array $xml = [
        'doctype_whitelist' => [],
    ];

    /**
     * @param  array $subscribers
     * @return self
     */
    public function setSerialization(array $subscribers): Visitors
    {
        $this->serialization = $subscribers;
        return $this;
    }

    /**
     * @return array
     */
    public function getSerialization(): array
    {
        return $this->serialization;
    }

    /**
     * @param array $deserialization
     */
    public function setDeserialization(array $deserialization): Visitors
    {
        $this->deserialization = $deserialization;
        return $this;
    }

    /**
     * @return array
     */
    public function getDeserialization(): array
    {
        return $this->deserialization;
    }

    /**
     * @param array $json
     * @return $this
     */
    public function setJson(array $json): Visitors
    {
        $this->json = $json;
        return $this;
    }

    /**
     * @return array
     */
    public function getJson(): array
    {
        return $this->json;
    }

    /**
     * @param array $xml
     * @return $this
     */
    public function setXml(array $xml): Visitors
    {
        $this->xml = $xml;
        return $this;
    }

    /**
     * @return array
     */
    public function getXml(): array
    {
        return $this->xml;
    }
}
