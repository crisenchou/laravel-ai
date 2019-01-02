# 人脸识别



## 人脸检测

~~~

// 使用base64编码图片进行检索
$code = "image base64 code";
$res = Ai::face()->base64($code)->detect()

// 使用url图片地址
$url = "http://domain/someimg.jpg";
$res = Ai::face()->url($url)->detect();

// 使用 本地文件路径
$path = 'path/to/file.jpg';
$res = Ai::face()->path($url)->detect();

// 兼容官方原生参数
$params = [
    'face_field' => 'age,beauty,expression,face_shape',
     'max_face_num' => 1,
     'face_type' => 'LIVE'
];
$url = "http://domain/someimg.jpg";
$res = Ai::face()->url($url)->detect($params);

if($res->success()){
     dump($res->toArray());
}
~~~



## 人脸对比

~~~
// 使用url图片进行对比
$res = Ai::face()->url('http://domain/some.jpg')->match();

// 使用base64编码图片进行对比
$res = Ai::face()->base64('Y3Jpc2VuY2hvdQ==')->match();

// 使用本地路径进行对比
$res = Ai::face()->path('/path/to/some.jpg')->match();

// 兼容官方可选参数
$res = Ai::face()->path('/path/to/some.jpg')->match([
    'face_type'        => 'LIVE',
    'quality_control'  => 'NONE'
    'liveness_control' => 'NONE'      
]);

if($res->success()){
    dump($res->toArray());
}

~~~

## 人脸搜索

> 1:n 搜索

~~~
// 以url图片进行搜索
$res = Ai::face()->url('http://domain/some.jpg')->groupList('some_group')->search();
// 以base64编码在多个组中进行搜索
$res = Ai::face()->base64('Y3Jpc2VuY2hvdQ==')->groupList([
    'group1','group2','group3'
])->search();
// 以本地图片路径进行搜索
$res = Ai::face()->path('/path/to/some.jpg')->groupList('some_group')->search();

// 兼容官方可选参数
$res = Ai::face()->path('/path/to/some.jpg')->groupList('some_group')->search([
    'quality_control'  => 'NONE',
    'liveness_control' => 'NONE',
    'user_id'          => 'some_user',
    'max_user_num'     => '1'
]);

if($res->success()){
    dump($res->toArray());
}

~~~

> m:n搜搜

~~~
// 以url图片进行搜索
$res = Ai::face()->url('http://domain/some.jpg')->groupList('some_group')->multiSearch();
// 以base64编码在多个组中进行搜索
$res = Ai::face()->base64('Y3Jpc2VuY2hvdQ==')->groupList([
    'group1','group2','group3'
])->search();
// 以本地图片路径进行搜索
$res = Ai::face()->path('/path/to/some.jpg')->groupList('some_group')->search();

// 兼容官方可选参数
$res = Ai::face()->path('/path/to/some.jpg')->groupList('some_group')->search([
	'max_face_num'     => '10',
	'match_threshold'  => '80',
    'quality_control'  => 'NONE',
    'liveness_control' => 'NONE',
    'max_user_num'          => '20',
]);

if($res->success()){
    dump($res->toArray());
}

~~~



## 身份验证

~~~

// 以网络图片地址进行验证
$res = Ai::face()->url('http://domain/id_card.jpg')->verify([
    'id_card_number'  => 'id_number',//身份证号
    'name'            => 'name'  // 名字 注意中文名字需要utf8格式
]);
// 以本地路径进行验证
$res = Ai::face()->path('/path/to/id_card.jpg')->verify([
    'id_card_number'  => 'id_number',//身份证号
    'name'            => 'name'  // 名字
]);

// 以图片base64编码进行验证
$res = Ai::face()->base64('Y3Jpc2VuY2hvdQ==c')->verify([
    'id_card_number'  => 'id_number',//身份证号
    'name'            => 'name'  // 名字
]);

// 以face token 进行验证
$res = Ai::face()->faceToken('face token')->verify([
    'id_card_number'  => 'id_number',//身份证号
    'name'            => 'name'  // 名字 
]);


if($res->success()){
    dump($res->toArray());
}

~~~







