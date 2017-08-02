<center><h1>Форма заказа</h1></center>
<?php
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin();?>
<?= $form->field($order_model, 'name')->textInput()->label('Имя') ?>
<?= $form->field($order_model, 'phone')->textInput()->label('Мобильный телефон')?>
<div>
    <a href="/site/index/" button type="submit" class="btn btn-success" name="btn">Отправить заказ</button></a>
</div>
<?php
ActiveForm::end();
?>