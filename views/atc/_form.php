<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Article $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model,'columnid')->dropDownList($columns) ?>
    
    <?= $form->field($model,'ishot')->dropDownList(['0'=>'普通','1'=>'推荐']) ?>
    
    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => 50]) ?>
    
    <?= $form->field($model, 'image')->fileInput() ?>
    <?php if($model->image){ ?>
    <?= Html::img($model->image,['width'=>'200px;']) ?>
    <?php } ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
