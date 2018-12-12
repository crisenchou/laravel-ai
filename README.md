# laravel-ai
使用laravel ai优雅的调用ai客户端

## 安装

~~~
composer require "crisen/laravel-ai":"dev-master"
~~~



## 发布资源

~~~
artisan vendor:publish --provider=Crisen\LaravelAi\AiServiceProvider
~~~



### 使用介绍

~~~php+HTML
namespace someNameSpace;

use Crisen\LaravelAi\Facades\Ai;

....

class SomeController{

	public function facesetAdd(){
		//人脸注册
		$res = AI::gateway('faceset.user')
			->url("jttp://domaon.com/someimgae.jpeg")
            ->add();
        dd($res);
	}
}
~~~



## 更多使用方法

- [详细文档](http://doc.crisen.org/ai)



## 支持的驱动

- 百度AI
- 腾讯优图 (1.0版本给予支持)
- face++ (1.0版本给予支持)



## LICENSE

[MIT](LICENSE)

## 



