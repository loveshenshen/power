<?php
// ////////////////////////////////////////////////////////////////////////////
//
// Copyright (c) 2015-2019 Hangzhou Freewind Technology Co., Ltd.
// All rights reserved.
// http://www.seastart.cn
//
// ///////////////////////////////////////////////////////////////////////////

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

    /**
     * GRpc constructor.
     * @param $serverName
     */
    public function __construct($serverName)
    {
        $serviceFactory = new SensioLabs\Consul\ServiceFactory([
            'base_uri'=>"http://{$this->consulHost}:{$this->consulPort}"
        ]);
        $cl = $serviceFactory->get("catalog"); //采用cataLog的服务方式
        $service = $cl->service($serverName); //参数传入和服务端约定的服务名
        $microServiceData = \GuzzleHttp\json_decode($service->getBody(), true);  //请求微服务的具体地址
        if(empty($microServiceData)){
            throw new InvalidArgumentException("Not found server of consul ");
        }
        $this->host = $microServiceData["ServiceAddress"];
        $this->port = $microServiceData["ServicePort"];
    }

    /**
     * @param $request
     * @return array
     * @throws Throwable
     */
    public function call($request){
        try{
            $client = new  \Region\RegionClient($this->host.":".$this->port,[
                'credentials' => \Grpc\ChannelCredentials::createInsecure(),
            ]);
            $result = $client->Send($request)->wait();
        }catch(\Exception $e){
           throw $e;
        }catch(\Throwable $e){
           throw $e;
        }
        return $result;
    }

}