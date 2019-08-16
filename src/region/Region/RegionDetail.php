<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: region.proto

namespace Region;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>region.RegionDetail</code>
 */
class RegionDetail extends \Google\Protobuf\Internal\Message
{
    /**
     *1.0
     *
     * Generated from protobuf field <code>string version = 1;</code>
     */
    private $version = '';
    /**
     * Generated from protobuf field <code>string appId = 2;</code>
     */
    private $appId = '';
    /**
     * Generated from protobuf field <code>string appSecret = 3;</code>
     */
    private $appSecret = '';
    /**
     * Generated from protobuf field <code>int32 regionId = 4;</code>
     */
    private $regionId = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $version
     *          1.0
     *     @type string $appId
     *     @type string $appSecret
     *     @type int $regionId
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Region::initOnce();
        parent::__construct($data);
    }

    /**
     *1.0
     *
     * Generated from protobuf field <code>string version = 1;</code>
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     *1.0
     *
     * Generated from protobuf field <code>string version = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setVersion($var)
    {
        GPBUtil::checkString($var, True);
        $this->version = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string appId = 2;</code>
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * Generated from protobuf field <code>string appId = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setAppId($var)
    {
        GPBUtil::checkString($var, True);
        $this->appId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string appSecret = 3;</code>
     * @return string
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * Generated from protobuf field <code>string appSecret = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setAppSecret($var)
    {
        GPBUtil::checkString($var, True);
        $this->appSecret = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 regionId = 4;</code>
     * @return int
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * Generated from protobuf field <code>int32 regionId = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setRegionId($var)
    {
        GPBUtil::checkInt32($var);
        $this->regionId = $var;

        return $this;
    }

}

