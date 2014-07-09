Yii2-Blog
================================

基于Yii2 basic版开发的简易blog程序。这是本人在学习Yii2过程中练习的小项目，其中有不合理的地方还请自行斟酌辨别！由于Yii2还没有正式发布，核心程序随时有可能改动，运行过程中可能会有报错！


目录结构
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



安装
------------

1.  直接运行`git clone https://github.com/BigKuCha/Yii2-Blog.git`克隆到工作目录，或者直接下载zip包
2.  vendor目录是空的，请自行拷贝Yii核心文件到vendor目录
3.  创建数据库 `myblog` 编码 `utf8-unicode-ci`
4.  运行`yii migrate`或者导入根目录下的 `myblog.sql`

配置
-------------

### 数据库

配置 `config/db.php` :

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=myblog',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```
###  Apache
开启apache的rewite模块，网站根目录指向`web/`  
**NOTE:** 如果不开启rewite，需要重新配置路由



------------

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this application template using the following command:

~~~
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~


