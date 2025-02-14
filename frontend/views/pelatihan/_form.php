<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Pelatihan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pelatihan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pelatihan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sertifikat_pelatihan')->dropDownList([ 'Ada' => 'Ada', 'Tidak' => 'Tidak', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tahun_pelatihan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pelamar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
