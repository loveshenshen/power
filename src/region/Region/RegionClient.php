<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Region;

/**
 */
class RegionClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Region\Request $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Region(\Region\Request $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/region.Region/Region',
        $argument,
        ['\Region\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Region\MessageRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Send(\Region\MessageRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/region.Region/Send',
        $argument,
        ['\Region\MessageResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Region\RegionDetail $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Detail(\Region\RegionDetail $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/region.Region/Detail',
        $argument,
        ['\Region\Response', 'decode'],
        $metadata, $options);
    }

}
