<?php
/**
 * Created by PhpStorm.
 * User: 95
 * Date: 14-8-2
 * Time: 下午1:22
 */

namespace app\assets;


use yii\web\AssetBundle;

class LtIe9Asset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOption = [
        'condition'=>'lt IE 9'
    ];
    public $css = [
    ];
    public $js = [
        'js/modernizr.js',
    ];
    public $depends = [
    ];
} 