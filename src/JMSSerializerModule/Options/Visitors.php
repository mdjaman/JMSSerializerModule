<?php

namespace JMSSerializerModule\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * HandlerRegistry options
 *
 * @author Martin Parsiegla <martin.parsiegla@gmail.com>
 */
class Visitors extends AbstractOptions
{
    /**
     * @var array
     */
    protected $serialization = [
        'json' => 'jms_serializer.json_serialization_visitor',
        'xml' => 'jms_serializer.xml_serialization_visitor',
        'yml' => 'jms_serializer.yaml_serialization_visitor',
    ];

    /**
     * @var array
     */
    protected $deserialization = [
        'json' => 'jms_serializer.json_deserialization_visitor',
        'xml' => 'jms_serializer.xml_deserialization_visitor',
    ];

    /**
     * Contains options for json visitor.
     *
     * @var array
     */
    protected $json = [
        'options' => 0,
    ];

    /**
     * Contains options for xml visitor.
     *
     * @var array
     */
    protected $xml = [
        'doctype_whitelist' => [],
    ];

    /**
     * @param  array $subscribers
     * @return self
     */
    public function setSerialization($subscribers)
    {
        $this->serialization = $subscribers;
        return $this;
    }

    /**
     * @return array
     */
    public function getSerialization()
    {
        return $this->serialization;
    }

    /**
     * @param array $deserialization
     */
    public function setDeserialization($deserialization)
    {
        $this->deserialization = $deserialization;
    }

    /**
     * @return array
     */
    public function getDeserialization()
    {
        return $this->deserialization;
    }

    /**
     * @param array $json
     * @return $this
     */
    public function setJson($json)
    {
        $this->json = $json;
        return $this;
    }

    /**
     * @return array
     */
    public function getJson()
    {
        return $this->json;
    }

    /**
     * @param array $xml
     * @return $this
     */
    public function setXml($xml)
    {
        $this->xml = $xml;
        return $this;
    }

    /**
     * @return array
     */
    public function getXml()
    {
        return $this->xml;
    }
}
