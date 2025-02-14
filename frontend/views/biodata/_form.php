<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use frontend\models\Pekerjaan;
use frontend\models\Pendidikan;
use frontend\models\Pelatihan;

/** @var yii\web\View $this */
/** @var frontend\models\Biodata $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="biodata-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'posisi_pelamar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nama_pelamar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ktp_pelamar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ttl_pelamar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'jk_pelamar')->dropDownList(['LAKI-LAKI' => 'LAKI-LAKI', 'PEREMPUAN' => 'PEREMPUAN'], ['prompt' => '']) ?>
    <?= $form->field($model, 'agama_pelamar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'goldar_pelamar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status_pelamar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'alamat_ktp_pelamar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'alamat_tinggal_pelamar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email_pelamar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tlp_pelamar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tlp2_pelamar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'skill_pelamar')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'ekspektasi_salary_pelamar')->textInput(['maxlength' => true]) ?>

    <?php if (!isset($pekerjaans) || empty($pekerjaans)) {$pekerjaans = [new Pekerjaan()];} ?>
    <?php if (!isset($pendidikan) || empty($pendidikan)) {$pendidikan = [new Pendidikan()];} ?>
    <?php if (!isset($pelatihan) || empty($pelatihan)) {$pelatihan = [new Pelatihan()];} ?>

    <h3>Riwayat Pekerjaan</h3>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper_pekerjaan',
        'widgetBody' => '.container-items-pekerjaan',
        'widgetItem' => '.item-pekerjaan',
        'limit' => 5,
        'min' => 1,
        'insertButton' => '.add-item-pekerjaan',
        'deleteButton' => '.remove-item-pekerjaan',
        'model' => $pekerjaans[0],
        'formId' => 'dynamic-form',
        'formFields' => ['perusahaan_riwayat', 'posisi_riwayat', 'salary_riwayat', 'tahun_pekerjaan_riwayat'],
    ]); ?>

    <div class="container-items-pekerjaan">
        <?php foreach ($pekerjaans as $index => $pekerjaan): ?>
            <div class="item-pekerjaan">
                <div class="row">
                    <div class="col-md-3"><?= $form->field($pekerjaan, "[{$index}]perusahaan_riwayat")->textInput() ?></div>
                    <div class="col-md-3"><?= $form->field($pekerjaan, "[{$index}]posisi_riwayat")->textInput() ?></div>
                    <div class="col-md-2"><?= $form->field($pekerjaan, "[{$index}]salary_riwayat")->textInput(['type' => 'number', 'step' => '0.000001']) ?></div>
                    <div class="col-md-2"><?= $form->field($pekerjaan, "[{$index}]tahun_pekerjaan_riwayat")->textInput() ?></div>
                    <div class="col-md-2"><button type="button" class="remove-item-pekerjaan btn btn-danger">Hapus</button></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <button type="button" class="add-item-pekerjaan btn btn-success">Tambah</button>
    <?php DynamicFormWidget::end(); ?>

    <h3>Riwayat Pendidikan</h3>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper_pendidikan',
        'widgetBody' => '.container-items-pendidikan',
        'widgetItem' => '.item-pendidikan',
        'limit' => 5,
        'min' => 1,
        'insertButton' => '.add-item-pendidikan',
        'deleteButton' => '.remove-item-pendidikan',
        'model' => $pendidikan[0],
        'formId' => 'dynamic-form',
        'formFields' => ['pendidikan_riwayat', 'nama_pendidikan_riwayat', 'jurusan_pendidikan_riwayat', 'tahun_lulus_riwayat', 'ipk_riwayat'],
    ]); ?>

    <div class="container-items-pendidikan">
        <?php foreach ($pendidikan as $index => $pendidikanItem): ?>
            <div class="item-pendidikan">
                <div class="row">
                    <div class="col-md-3"><?= $form->field($pendidikanItem, "[{$index}]pendidikan_riwayat")->textInput() ?></div>
                    <div class="col-md-3"><?= $form->field($pendidikanItem, "[{$index}]nama_pendidikan_riwayat")->textInput() ?></div>
                    <div class="col-md-3"><?= $form->field($pendidikanItem, "[{$index}]jurusan_pendidikan_riwayat")->textInput() ?></div>
                    <div class="col-md-2"><?= $form->field($pendidikanItem, "[{$index}]tahun_lulus_riwayat")->textInput() ?></div>
                    <div class="col-md-2"><?= $form->field($pendidikanItem, "[{$index}]ipk_riwayat")->textInput() ?></div>
                    <div class="col-md-2"><button type="button" class="remove-item-pendidikan btn btn-danger">Hapus</button></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <button type="button" class="add-item-pendidikan btn btn-success">Tambah</button>
    <?php DynamicFormWidget::end(); ?>

    <h3>Riwayat Pelatihan</h3>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper_pelatihan',
        'widgetBody' => '.container-items-pelatihan',
        'widgetItem' => '.item-pelatihan',
        'limit' => 5,
        'min' => 1,
        'insertButton' => '.add-item-pelatihan',
        'deleteButton' => '.remove-item-pelatihan',
        'model' => $pelatihan[0],
        'formId' => 'dynamic-form',
        'formFields' => ['nama_pelatihan', 'sertifikat_pelatihan', 'tahun_pelatihan'],
    ]); ?>

    <div class="container-items-pelatihan">
        <?php foreach ($pelatihan as $index => $pelatihanItem): ?>
            <div class="item-pelatihan">
                <div class="row">
                    <div class="col-md-4"><?= $form->field($pelatihanItem, "[{$index}]nama_pelatihan")->textInput() ?></div>
                    <div class="col-md-3">
                        <?= $form->field($pelatihanItem, "[{$index}]sertifikat_pelatihan")->dropDownList(['Ada' => 'Ada', 'Tidak' => 'Tidak'], ['prompt' => 'Pilih']) ?>
                    </div>
                    <div class="col-md-3"><?= $form->field($pelatihanItem, "[{$index}]tahun_pelatihan")->textInput() ?></div>
                    <div class="col-md-2"><button type="button" class="remove-item-pelatihan btn btn-danger">Hapus</button></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <button type="button" class="add-item-pelatihan btn btn-success">Tambah</button>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
