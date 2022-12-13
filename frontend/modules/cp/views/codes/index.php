<?php

use common\models\Codes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\CodesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Codes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Codes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code',
//            'code_1',
//            'code_2',
//            'code_3',
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
            //'type_id',
            //'param_id',
            'params',
            //'param_1',
            //'param_2',
            //'param_3',
            //'param_4',
            //'param_5',
            //'table_name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Codes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'code' => $model->code]);
                 }
            ],
        ],
    ]); ?>


</div>
