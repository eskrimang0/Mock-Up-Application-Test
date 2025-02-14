<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\PedidikanSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pendidikan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pendidikan') ?>

    <?= $form->field($model, 'pendidikan_riwayat') ?>

    <?= $form->field($model, 'nama_pendidikan_riwayat') ?>

    <?= $form->field($model, 'jurusan_pendidikan_riwayat') ?>

    <?= $form->field($model, 'tahun_lulus_riwayat') ?>

    <?php // echo $form->field($model, 'ipk_riwayat') ?>

    <?php // echo $form->field($model, 'id_pelamar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
