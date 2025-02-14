<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\PekerjaanSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pekerjaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pekerjaan') ?>

    <?= $form->field($model, 'perusahaan_riwayat') ?>

    <?= $form->field($model, 'posisi_riwayat') ?>

    <?= $form->field($model, 'salary_riwayat') ?>

    <?= $form->field($model, 'tahun_pekerjaan_riwayat') ?>

    <?php // echo $form->field($model, 'id_pelamar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
