<?php
namespace app\widgets;
use yii\base\Widget;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use app\models\Article;
use yii\caching\FileCache;
class newWidget extends Widget
{
    public $limit = 5;
    public $columnid;
    public $ulclass = 'rank';
    
    public function init() {
        parent::init();
        if(!in_array($this->ulclass,['rank','paih']))
            throw new \yii\web\HttpException('ulclass is not allowed!');
    }
    public function run()
    {
        \Yii::$app->fcache->keyPrefix = $this->ulclass.$this->columnid;
        if(\Yii::$app->fcache->exists('dataprovider'))
            $dataprovider = \Yii::$app->fcache->get('dataprovider');
        else
        {
            $dataprovider = new ActiveDataProvider([
                'query'=>  Article::find()->orderBy(($this->ulclass== 'rank')?'addtime desc':'clicks desc')->filterWhere(['columnid'=>$this->columnid]),
                'pagination'=>[
                    'defaultPageSize'=>$this->limit,
                ],
            ]);
            $duration = 3600;
            \Yii::$app->fcache->set('dataprovider', $dataprovider,$duration);
        }
        return ListView::widget([
            'dataProvider'=>$dataprovider,
            'options'=>[
                'tag'=>'ul',
                'class'=>$this->ulclass,
            ],
            'itemOptions'=>[
                'tag'=>'li',
            ],
            'itemView' => function ($model, $key, $index, $widget){
                if($this->ulclass=='paih')
                    return Html::a(Html::encode($model->title)."(点击次数：".$model->clicks.")", ['detail', 'id' => $model->id]);
                else
                    return Html::a(Html::encode($model->title), ['detail', 'id' => $model->id]);
            },
            'layout'=>'{items}',
        ]);
    }
    
}
