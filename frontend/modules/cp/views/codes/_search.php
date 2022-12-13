<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\search\CodesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="codes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'code_1') ?>

    <?= $form->field($model, 'code_2') ?>

    <?= $form->field($model, 'code_3') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <?php // echo $form->field($model, 'param_id') ?>

    <?php // echo $form->field($model, 'params') ?>

    <?php // echo $form->field($model, 'param_1') ?>

    <?php // echo $form->field($model, 'param_2') ?>

    <?php // echo $form->field($model, 'param_3') ?>

    <?php // echo $form->field($model, 'param_4') ?>

    <?php // echo $form->field($model, 'param_5') ?>

    <?php // echo $form->field($model, 'table_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
