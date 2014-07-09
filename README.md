Yii2-Blog
================================

基于Yii2 basic版开发的简易blog程序。由于Yii2还没有正式发布，核心程序随时有可能改动，运行过程中可能会有报错！

###  包含的内容
这是本人在学习Yii2过程中练习的小项目，有些东西是为了应用而应用，姿势不一定优雅！仅供借鉴参考。  
1.  ActiveRecord-CRUD  
2.  模板传值  
3.  Scopes  
4.  关联查询  
5.  分页  
6.  登录  
7.  外部Action  
8.  事件&行为  
9.  自定义小物件(Widget)  
10.  文件缓存  
11.  GridView & ListView  

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

### 关于Yii2
Yii官方网站 [yiiframework.com](http://www.yiiframework.com)  
Yii2仓库地址[yiisoft/yii2](https://github.com/yiisoft/yii2)




