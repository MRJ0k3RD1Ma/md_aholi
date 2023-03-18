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
                                <th>Mahalla nomi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $n=0; foreach ($model as $item): $n++; ?>
                            <tr>
                                <td><?= $n;?></td>
                                <td><a href="<?= Yii::$app->urlManager->createUrl(['/district/default/list','soato'=>$item->id])?>"><?= $item->name_cyr?></a></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
