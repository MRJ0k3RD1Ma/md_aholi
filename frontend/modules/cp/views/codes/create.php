<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Codes $model */

$this->title = 'Kodlar qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Kodlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codes-create">

    <div class="card">
        <div class="card-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
