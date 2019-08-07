<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: region.proto

namespace Region;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>region.messageResponse</code>
 */
class messageResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 api_code = 1;</code>
     */
    private $api_code = 0;
    /**
     * Generated from protobuf field <code>string data = 2;</code>
     */
    private $data = '';
    /**
     * Generated from protobuf field <code>string api_msg = 3;</code>
     */
    private $api_msg = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $api_code
     *     @type string $data
     *     @type string $api_msg
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Region::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 api_code = 1;</code>
     * @return int
     */
    public function getApiCode()
    {
        return $this->api_code;
    }

    /**
     * Generated from protobuf field <code>int32 api_code = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setApiCode($var)
    {
        GPBUtil::checkInt32($var);
        $this->api_code = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string data = 2;</code>
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Generated from protobuf field <code>string data = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setData($var)
    {
        GPBUtil::checkString($var, True);
        $this->data = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string api_msg = 3;</code>
     * @return string
     */
    public function getApiMsg()
    {
        return $this->api_msg;
    }

    /**
     * Generated from protobuf field <code>string api_msg = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setApiMsg($var)
    {
        GPBUtil::checkString($var, True);
        $this->api_msg = $var;

        return $this;
    }

}

