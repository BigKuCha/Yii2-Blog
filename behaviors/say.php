<?php
namespace app\behaviors;

use yii\base\Behavior;
class say extends Behavior
{
    const EVENT_BEFORE_SAY = 'beforesay';
    const EVENT_AFTER_SAY = 'aftersay';
    

    public $name;
    public $age;
    
    public function init()
    {
        
    }
    public function events() {
//        parent::events();
        return [
            \yii\web\Controller::EVENT_AFTER_ACTION=>'beforesay',
        ];
    }
    public function beforesay($event)
    {
        echo "beforesay!!";
    }
    public function Say()
    {
        echo $this->name.'--'.$this->age;
    }
}
