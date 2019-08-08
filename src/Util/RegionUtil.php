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
 * Time: 11:05
 * Author: shen
 */
use src\Rpc\GRpc;
use HttpException;
use Throwable;

class RegionUtil
{
    private static  $appId = '1111';
    private static  $secret = '2222';
    private static  $version = '1.0';


    /**
     * @param int $type type 0-国家 1-省 2-市 3-区 4-街道
     * @param int $parentId
     * @param int $page
     * @param int $num
     * @return array
     * @throws HttpException
     * @throws Throwable
     */
    public static function getRegionList($type,$parentId = 0,$page = 0,$num = 20){
        $rpc = new GRpc();
        $request = new \Region\Request();

        if(isset(\Yii::$app->params['application'])){
            if(isset(\Yii::$app->params['application']['appId'])){
                self::$appId = \Yii::$app->params['application']['appId'];
            }
            if(isset(\Yii::$app->params['application']['appSecret'])){
                self::$secret = \Yii::$app->params['application']['appSecret'];
            }
        }
        $request->setAppId(self::$appId);
        $request->setAppSecret(self::$secret);
        $request->setVersion(self::$version);
        $request->setType($type);
        $request->setParentId($parentId);
        $request->setPage($page);
        $request->setNum($num);
        $result = $rpc->call($request,"Region");
        if(!isset($result[0]) ){
            throw new HttpException("Result is Invalid");
        }
        if($result[0] instanceof  \Region\Response){
            return [
                'api_code'=>$result[0]->getApiCode(),
                'data'=>json_decode($result[0]->getData(),true),
                'api_msg'=>$result[0]->getApiMsg()
            ];
        }else{
            throw new HttpException("Result is Invalid");
        }
    }

}