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
 * Date: 2019/8/5
 * Time: 19:10
 * Author: shen
 */

include "../vendor/autoload.php";
include "GPBMetadata/Region.php";
include "Region/Request.php";
include "Region/Response.php";
include "Region/RegionClient.php";
include "Region/messageRequest.php";
include "Region/messageResponse.php";


$serviceFactory = new SensioLabs\Consul\ServiceFactory();
$cl = $serviceFactory->get("catalog"); //采用cataLog的服务方式
$service = $cl->service("go.micro.srv.greeter"); //参数传入和服务端约定的服务名
$microServiceData = \GuzzleHttp\json_decode($service->getBody(), true)[0];  //请求微服务的具体地址
$host = $microServiceData["ServiceAddress"];
$port = $microServiceData["ServicePort"];

echo "port:".$port.PHP_EOL;

try{
    $client = new  \Region\RegionClient($host.":".$port,[
        'credentials' => \Grpc\ChannelCredentials::createInsecure(),
    ]);

//    $request  = new Region\Request();
//    $request->setParentId( 0 );
//    $request->setAppId("111");
//    $request->setAppSecret("111");
//    $request->setNum(10);
//    $request->setPage(0);
//    $request->setType(0);
//    $request->setVersion("1.0");
//
//
//    $result   =  $client->Region($request)->wait();
//    if($result[0] instanceof  \Region\Response){
//        if($result[0]->getApiCode() == 200 ){
//            var_dump($result[0]->getData() );
//        }else{
//            var_dump($result[0]->getApiMsg());
//        }
//    }

    //测试发短信
    $messageRequest = new \Region\messageRequest();
    $messageRequest->setAppId('1111');
    $messageRequest->setAppSecret('222');
    $messageRequest->setMobile('17858620363');
    $messageRequest->setText('【博莱科信谊】您的博影问道验证码是123657');
    $messageRequest->setType(1);
    $messageRequest->setVersion("1.0");
    $result = $client->Send($messageRequest)->wait();
    if($result[0] instanceof  \Region\messageResponse){
        if($result[0]->getApiCode() == 200 ){
            var_dump($result[0]->getData() );
        }else{
            var_dump($result[0]->getApiMsg() );
        }
    }

}catch(\Exception $e){

}catch(\Throwable $e){

}
