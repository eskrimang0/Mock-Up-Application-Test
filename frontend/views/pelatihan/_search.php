<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\PelatihanSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pelatihan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pelatihan') ?>

    <?= $form->field($model, 'nama_pelatihan') ?>

    <?= $form->field($model, 'sertifikat_pelatihan') ?>

    <?= $form->field($model, 'tahun_pelatihan') ?>

    <?= $form->field($model, 'id_pelamar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
