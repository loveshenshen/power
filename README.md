# power
配置 服务端的consul

```
   "consul"=>[
           'class'=>\src\Core\Consul::className(),
           'host'=>'127.0.0.1', //consul 所在服务器的地址
           'port'=>'8500',
           'serverName'=>'go.micro.srv.greet'
           
   ],
   
```