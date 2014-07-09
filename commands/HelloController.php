<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    public $name = "大裤衩子";
    public $age;
    
    public function init()
    {
        $this->age or $this->age = 25;
    }
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }
    
    public function actionSay()
    {
        $this->call("我叫".$this->name);
        $this->call("我今年".$this->age."岁了");
        $this->call("我的邮箱是'nevermore1989@vip.qq.com'");
    }
    protected function call($str)
    {
        echo $str."\n";
        sleep(1);
    }
    /**
     * 数组内的值可以通过命令行传值
     * 例如： yii hello/say --name="小明" --age=10
     * @param type $actionId
     * @return type
     */
    public function options($actionId)
    {
        // $id might be used in subclass to provide options specific to action id
        return ['name', 'age'];
    }
}
