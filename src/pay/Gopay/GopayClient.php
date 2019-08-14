<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Gopay;

/**
 */
class GopayClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Gopay\Request $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Pay(\Gopay\Request $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gopay.Gopay/Pay',
        $argument,
        ['\Gopay\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Gopay\RefundRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Refund(\Gopay\RefundRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gopay.Gopay/Refund',
        $argument,
        ['\Gopay\Response', 'decode'],
        $metadata, $options);
    }

}
