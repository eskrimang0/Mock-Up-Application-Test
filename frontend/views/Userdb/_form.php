<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Userdb $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="userdb-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role_user')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
