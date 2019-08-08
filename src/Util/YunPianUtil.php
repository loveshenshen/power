<?php
// ////////////////////////////////////////////////////////////////////////////
//
// Copyright (c) 2015-2019 Hangzhou Freewind Technology Co., Ltd.
// All rights reserved.
// http://www.seastart.cn
//
// ///////////////////////////////////////////////////////////////////////////
namespace src\Util;
/**
 * Created by PhpStorm.
 * User: sarukinhyou
 * Date: 2019/8/7
 * Time: 11:04
 * Author: shen
 */
use src\Rpc\GRpc;
use HttpException;
use Throwable;


class YunPianUtil
{
      private static  $appId = '';
      private static  $secret = '';
      private static  $version = '';
      private static  $type = 1;//type =1 默认是云片
      private static  $serverName = "go.micro.srv.greeter";


    /**
     * @param $mobile
     * @param $text
     * @return array
     * @throws HttpException
     * @throws Throwable
     */
      public static function sendMessage($mobile,$text){
           $rpc = new GRpc(self::$serverName);
           $request = new \Region\messageRequest();
           $request->setVersion(self::$version);
           $request->setType(self::$type);
           $request->setAppId(self::$appId);
           $request->setAppSecret(self::$secret);
           $request->setMobile($mobile);
           $request->setText($text);
           $result = $rpc->call($request);
           if(!isset($result[0]) ){
               throw new HttpException("Result is Invalid");
           }
          if($result[0] instanceof  \Region\messageResponse){
              return [
                  'api_code'=>$result[0]->getApiCode(),
                  'data'=>$result[0]->getData(),
                  'api_msg'=>$result[0]->getApiMsg()
              ];
          }else{
              throw new HttpException("Result is Invalid");
          }
      }
}