# laravel-ai
使用laravel ai优雅的调用ai客户端

## 安装

~~~
composer require "crisen/laravel-ai":"dev-master"
~~~

非laravel版本,(点击这里)[https://github.com/crisenchou/ai]

### 配置

app.php中

~~~

'providers' => [
    
    .....
    
    Crisen\LaravelAi\AiServiceProvider::class,
    
];

'aliases' => [
    
    ....
    
    'Ai' => Crisen\LaravelAi\Facades\Ai::class,
]
~~~

## 发布资源

~~~
artisan vendor:publish --provider=Crisen\LaravelAi\AiServiceProvider
~~~

### 配置

ai.php

~~~
return [
    
    'default' => 'baidu',


    'drivers' => [
        'baidu' => [
            'app_id' => 'your appid', // 百度appid
            'api_key' => 'your api key', // 百度apikey
            'secret_key' => 'your api secret' // 百度secret key
        ],
    ]
];
~~~



### 使用介绍

~~~php+HTML
namespace someNameSpace;

use Crisen\LaravelAi\Facades\Ai;

....

class SomeController{

	public function facesetAdd(){
		//人脸检索
		$res = Ai::face()
		        ->url("http://domaon.com/someimgae.jpeg")
		        ->detect();
		 dd($res);
	}
}
~~~



## 更多使用方法

- [详细文档](http://doc.crisen.org/ai)



## 支持的驱动

- 百度AI
- 腾讯ai(即将到来)



## LICENSE

[MIT](LICENSE)

