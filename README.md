# power
配置 服务端的consul

main-local.php

```
   "consul"=>[
           'class'=>\src\Core\Consul::class,
           'host'=>'127.0.0.1', //consul 所在服务器的地址
           'port'=>'8500',
           //微服务名称配置
           'serverName'=>[
                'yunpian' =>'go.micro.srv.region',
                'region' =>'go.micro.srv.region',
                'pay' =>'go.micro.srv.gopay',
           ] ,
            
   ],
   
```
 common/param-local.php
 
 ```
    
    'application' => [
         'appId' => 'zHSeDQzMoc8NXTU343C046',
         'appSecret' => 'M3yPArGsmmATnrreqWn3sA',
     ],
 
 ```

useage

```
   发短信
  
   先进行appid  和 appsecret 配置
   
   
  
   
   
   
   \src\Util\YunPainUtil::sendMessage($mobile,$text) 
   
   获取省市区
   
   \src\Util\RegionUtil::getRegionList(0)

```