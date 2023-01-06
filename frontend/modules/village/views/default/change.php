<?php


use yii\widgets\ActiveForm;

$this->title = Yii::$app->user->identity->soato->name_lot.' statistikalari';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $form =  ActiveForm::begin()?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Kod</th>
                            <th>Parametr nomi</th>
                            <th>Qiymati</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $n=0; foreach ($model as $item): $n++; ?>
                            <tr>
                                <td><?= $n;?></td>
                                <td><?= $item->c_code?></td>
                                <td><?= $item->c_name ?></td>

                                <td>
                                    <?php $type = $item->c_type_id; if($type == 2){  ?>

                                        <?= $form->field($changer,'['.$item->c_code.']num')->textInput(['value'=>$item->value])->label(false) ?>

                                    <?php }elseif($type == 3){ $changer->date = $item->value; ?>

                                        <?= $form->field($changer,'['.$item->c_code.']date')->textInput(['type'=>'date','value'=>$item->value])->label(false) ?>

                                    <?php }elseif($type == 4 or $type == 6){ $changer->str = $item->value; ?>

                                        <?= $form->field($changer,'['.$item->c_code.']str')->textInput(['value'=>$item->value])->label(false) ?>

                                    <?php }elseif($type == 5){ ?>
                                        <?= $form->field($changer,'['.$item->c_code.']file')->fileInput()->label(false) ?>

                                    <?php }?>
                                </td>

                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>

                <button class="btn btn-success">Saqlash</button>

            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end() ?>