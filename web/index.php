<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');
/**
 * 重写StringHelper类后更改类的路径，不用修改namespace和类名，此方法可重写任何类！
 */
Yii::$classMap['yii\helpers\StringHelper'] = "../components/helpers/StringHelper.php";
(new yii\web\Application($config))->run();