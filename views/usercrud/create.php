<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Tuser $model
 */

$this->title = 'Create Tuser';
$this->params['breadcrumbs'][] = ['label' => 'Tusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
