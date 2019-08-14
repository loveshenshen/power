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
 * Date: 2019/8/14
 * Time: 09:54
 * Author: shen
 */

namespace src\Util;

use Gopay\RefundRequest;
use Gopay\Request;
use Gopay\Response;
use src\Rpc\GRpc;
use HttpException;
use Throwable;

class PayUtil
{
    private static  $appId = '1111';
    private static  $secret = '2222';
    private static  $version = '1.0';


    /**
     * @param string $sn  订单编号
     * @param float $amount 金额
     * @param  int $platform 支付终端 // 1-app 2-小程序 3-公众号 4-pc
     * @param int $payType 支付类型 1-微信 2-支付宝
     * @param string $remark 备注 回调的body字段
     * @param string $callback 回调地址
     * @param string $openid  公众号支付需要openid
     * @return array
     * @throws HttpException
     * @throws Throwable
     */
    public static function Pay($sn,$amount,$platform,$payType = 1,$remark,$callback,$openid=""){
        $rpc = new GRpc();
        $request = new Request();

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
        $request->setSn($sn);
        $request->setAmount($amount);
        $request->setPlatform($platform);
        $request->setPayType($payType);
        $request->setRemark($remark);
        $request->setOpenid($openid);
        $request->setCallback($callback);

        $result = $rpc->call($request,"Pay");
        if(!isset($result[0]) ){
            throw new HttpException("Result is Invalid");
        }
        if($result[0] instanceof  Response){
            return [
                'api_code'=>$result[0]->getApiCode(),
                'data'=>json_decode($result[0]->getData(),true),
                'api_msg'=>$result[0]->getApiMsg()
            ];
        }else{
            throw new HttpException("Result is Invalid");
        }
    }


    /**
     * @param string $sn 退款订单号
     * @param float $amount 退款金额
     * @param int $refundType 1-微信 2-支付宝
     * @param int $platform  退款类型 微信： 1-app 2-小程序 3-公众号 4-pc 支付宝 1-app 2-
     * @param string $tradeNo 支付单号(支付成功由第三方返回支付宝trade_no,微信transaction_id)
     * @param float $totalAmount  订单总金额
     * @param string $remark  退款原因
     * @return array
     * @throws HttpException
     * @throws Throwable
     */
    public static function  Refund($sn,$amount,$refundType = 1,$platform,$tradeNo,$totalAmount,$remark){
        $rpc = new GRpc();
        $request = new RefundRequest();

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
        $request->setSn($sn);
        $request->setAmount($amount);
        $request->setPlatform($platform);
        $request->setRefundType($refundType);
        $request->setTradeNo($tradeNo);
        $request->setTotalAmount($totalAmount);
        $request->setRemark($remark);

        $result = $rpc->call($request,"Refund");
        if(!isset($result[0]) ){
            throw new HttpException("Result is Invalid");
        }
        if($result[0] instanceof  Response){
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