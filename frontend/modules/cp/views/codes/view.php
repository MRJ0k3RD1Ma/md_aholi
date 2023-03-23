<?php

use common\models\Offer;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Codes $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kodlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="codes-view">

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        <?= Html::a('O`zgartirish', ['update', 'code' => $model->code], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('O`chirish', ['delete', 'code' => $model->code], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'code',
                            'code_1',
                            'code_2',
                            'code_3',
                            'name',
                            [
                                'attribute'=>'type_id',
                                'value'=>function($d){
                                    return @$d->type->name;
                                },
                                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\CodeType::find()->all(),'id','name')
                            ],
                            [
                                'attribute'=>'param_id',
                                'value'=>function($d){
                                    return @$d->param->name;
                                },
                                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Param::find()->all(),'id','name')
                            ],
                            'params',
                            'param_1',
                            'param_2',
                            'param_3',
                            'param_4',
                            'param_5',
                            'table_name',
                        ],
                    ]) ?>
                </div>
                <div class="col-md-6">
                    <h4>Taklif qo'shish</h4>
                    <?php $form = ActiveForm::begin(); $offer = new Offer(); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($offer, 'min')->textInput(['maxlength' => true]) ?>

                        </div>
                        <div class="col-md-6">
                            <?= $form->field($offer, 'max')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($offer, 'name')->textarea(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end()?>
                    <hr>
                    <h4>Ushbu kod uchun takliflar ro'yhati</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Min</th>
                            <th>Max</th>
                            <th>Nomi</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $n=0; foreach ($model->offer as $offer){ $n++;?>
                            <tr>
                                <td><?= $n?></td>
                                <td><?=$offer->min?></td>
                                <td><?=$offer->max?></td>
                                <td><?=$offer->name?></td>
                                <td>
                                    <?= Html::a('<span class="fa fa-trash"></span>', ['deloff', 'id' => $offer->id,'code'=>$offer->code], [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>

</div>
