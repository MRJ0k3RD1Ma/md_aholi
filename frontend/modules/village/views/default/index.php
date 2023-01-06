<?php


$this->title = Yii::$app->user->identity->soato->name_lot.' statistikalari';
$this->params['breadcrumbs'][] = $this->title;

?>


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
                                <td><?= $item->value ?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>