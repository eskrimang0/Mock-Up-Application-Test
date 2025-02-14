<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Pekerjaan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pekerjaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'perusahaan_riwayat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'posisi_riwayat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'salary_riwayat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_pekerjaan_riwayat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pelamar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
