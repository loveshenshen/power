<?php
// ////////////////////////////////////////////////////////////////////////////
//
// Copyright (c) 2015-2019 Hangzhou Freewind Technology Co., Ltd.
// All rights reserved.
// http://www.seastart.cn
//
// ///////////////////////////////////////////////////////////////////////////
namespace src\Rpc;


use InvalidArgumentException;
use Throwable;
/**
 * Created by PhpStorm.
 * User: sarukinhyou
 * Date: 2019/8/7
 * Time: 10:53
 * Author: shen
 */
class GRpc
{
    private $host;
    private $port;
    private $consulHost =  '127.0.0.1';
    private $consulPort =  8500;
    private $serverName =  "go.micro.srv.greeter";

    /**
     * GRpc constructor.
     * @param $serverName
     */
    public function __construct($serverName = '' )
    {
        $consul = \Yii::$app->consul;
        if(!$consul){
            throw new InvalidArgumentException(" Consul is not  config.");
        }
        if(!empty($consul->host)){
            $this->host = $consul->host;
            $this->consulHost = $consul->host;
        }
        if(!empty($consul->port)){
            $this->port = $consul->port;
            $this->consulPort = $consul->port;
        }
        if(!empty($serverName)){
            $this->serverName = $serverName;
        }

        $serviceFactory = new \SensioLabs\Consul\ServiceFactory([
            'base_uri'=>"http://{$this->consulHost}:{$this->consulPort}"
        ]);
        $cl = $serviceFactory->get("catalog"); //采用cataLog的服务方式
        $service = $cl->service($this->serverName); //参数传入和服务端约定的服务名
        $microServiceData = \GuzzleHttp\json_decode($service->getBody(), true)[0];  //请求微服务的具体地址
        if(empty($microServiceData)){
            throw new InvalidArgumentException("Not found server of consul ");
        }
        $this->host = $microServiceData["ServiceAddress"];
        $this->port = $microServiceData["ServicePort"];
    }

    /**
     * @param $request
     * @param String $method
     * @return array
     * @throws Throwable
     */
    public function call($request,$method,$clientName){
        try{
            $clientName = '\\'.$clientName;
            $client = new  $clientName($this->host.":".$this->port,[
                'credentials' => \Grpc\ChannelCredentials::createInsecure(),
            ]);
            $result = $client->$method($request)->wait();
        }catch(\Exception $e){
           throw $e;
        }catch(\Throwable $e){
           throw $e;
        }
        return $result;
    }

}