
<h1>Войти</h1>
<?php
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin();?>

<?= $form->field($login_model,'email')->textInput()->label('Почта')?>

<?= $form->field($login_model,'password')->passwordInput()->label('Пароль')?>

<div>
    <button class="btn btn-success" type="submit">Login</button>
</div>



<?php $form = ActiveForm::end();?>