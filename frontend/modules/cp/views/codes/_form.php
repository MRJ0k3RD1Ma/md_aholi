<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Codes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="codes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'code_1')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'code_2')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'code_3')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'type_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\CodeType::find()->all(),'id','name')) ?>

            <?= $form->field($model, 'param_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Param::find()->all(),'id','name')) ?>

        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'params')->textInput() ?>

            <?= $form->field($model, 'param_1')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'param_2')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'param_3')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'param_4')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'param_5')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'table_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'formula')->textInput(['maxlength' => true]) ?>

        </div>
    </div>
    <br>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
