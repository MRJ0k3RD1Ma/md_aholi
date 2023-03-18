<?php
   use yii\widgets\ActiveForm;


   $this->title = "Administrator sahifasi";
?>

<div class="card">
    <div class="card-body">
        <h3 class="card-title">Kodlarni <span class="text text-danger">.xlsx</span> fayldan import qilish</h3>
        <?php $form = ActiveForm::begin()?>
        <br>
        <?= $form->field($model,'file')->fileInput()?>
        <br>
        <button class="btn btn-success" type="submit">Import qilish</button>
        <?php ActiveForm::end()?>
    </div>
</div>