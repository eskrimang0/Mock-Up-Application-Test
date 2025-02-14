<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\BiodataSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="biodata-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pelamar') ?>

    <?= $form->field($model, 'posisi_pelamar') ?>

    <?= $form->field($model, 'nama_pelamar') ?>

    <?= $form->field($model, 'ktp_pelamar') ?>

    <?= $form->field($model, 'ttl_pelamar') ?>

    <?php // echo $form->field($model, 'jk_pelamar') ?>

    <?php // echo $form->field($model, 'agama_pelamar') ?>

    <?php // echo $form->field($model, 'goldar_pelamar') ?>

    <?php // echo $form->field($model, 'status_pelamar') ?>

    <?php // echo $form->field($model, 'alamat_ktp_pelamar') ?>

    <?php // echo $form->field($model, 'alamat_tinggal_pelamar') ?>

    <?php // echo $form->field($model, 'email_pelamar') ?>

    <?php // echo $form->field($model, 'tlp_pelamar') ?>

    <?php // echo $form->field($model, 'tlp2_pelamar') ?>

    <?php // echo $form->field($model, 'skill_pelamar') ?>

    <?php // echo $form->field($model, 'ekspektasi_salary_pelamar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
