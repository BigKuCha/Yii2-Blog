<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Tuser $model
 */

$this->title = 'Update Tuser: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tuser-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
