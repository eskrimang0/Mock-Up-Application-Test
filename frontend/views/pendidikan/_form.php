<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Pendidikan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pendidikan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pendidikan_riwayat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pendidikan_riwayat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jurusan_pendidikan_riwayat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_lulus_riwayat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipk_riwayat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pelamar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
