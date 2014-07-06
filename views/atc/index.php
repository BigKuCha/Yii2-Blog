<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;
/**
 * @var yii\web\View $this
 * @var app\models\ArticleSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */
use yii\grid\DataColumn;
$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout'=>'{items}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content:ntext',
            'keywords',
            'author',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
