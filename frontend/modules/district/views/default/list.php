<?php


$this->title = Yii::$app->user->identity->soato->name_lot.' statistikalari';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="card">
    <div class="card-body">
        <h3 class="card-title">Kodlar</h3>
        <div class="row">
            <div class="col-md-12">
                <form method="get" action="<?= Yii::$app->urlManager->createUrl(['/district/default/list'])?>">
                    <input type="hidden" hidden name="soato" value="<?= $soato_id?>">
                    <input name="code" class="first__input fon_rangi" type="submit" value="10" />
                    <input name="code" class="second__input" type="submit" value="12" />
                    <input name="code" class="second__input" type="submit" value="14" />
                    <input name="code" class="second__input" type="submit" value="16" />
                    <input name="code" class="second__input" type="submit" value="18" />
                    <input name="code" class="second__input" type="submit" value="20" />
                    <input name="code" class="second__input" type="submit" value="22" />
                    <input name="code" class="second__input" type="submit" value="24" />
                    <input name="code" class="olti__input" type="submit" value="26" />
                </form>
            </div>
        </div>
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
