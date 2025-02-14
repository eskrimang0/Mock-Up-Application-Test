<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use frontend\models\Biodata;

$this->title = 'EDII RECRUITMENT';

$isGuest = Yii::$app->user->isGuest;
$username = !$isGuest ? Yii::$app->user->identity->username : null;
$hasFilledForm = !$isGuest ? Yii::$app->user->identity->isFormFilled() : false;
$biodata = !$isGuest ? \frontend\models\Biodata::findOne(['id_pelamar' => Yii::$app->user->identity->id]) : null;

?>
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Selamat datang</h1>
            <!-- <p class="fs-5 fw-light">Untuk kandidat pelamar, silahkan isi form application.</p> -->
        </div>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <!-- Space kosong -->
            </div>

            <?php if ($username === 'admin'): ?>
                    <h2>DATA PELAMAR</h2>
                    <p>Manajemen list pelamar.</p>
                    <p><?= Html::a('Kelola Data Pelamar', ['/biodata/index'], ['class' => 'btn btn-primary']) ?></p>
                <?php elseif (!$isGuest): ?>
                    <?php if ($hasFilledForm && $biodata): ?>
                        <h2>APLIKASI SAYA</h2>
                        <p>Lihat atau edit lamaran anda.</p>
                        <p><?= Html::a('Lihat Data Anda', ['/biodata/view', 'id' => $biodata->id_pelamar], ['class' => 'btn btn-success']) ?></p>
                    <?php else: ?>
                        <h2>ISI FORM APLIKASI</h2>
                        <p>Silahkan isi form aplikasi atau lamaran anda.</p>
                        <p><?= Html::a('Isi Form', ['/biodata/create'], ['class' => 'btn btn-warning']) ?></p>
                    <?php endif; ?>
                <?php else: ?>
                    <h2>LOGIN / SIGN UP</h2>
                    <p>Silahkan login atau daftar untuk mengisi aplikasi.</p>
                    <p><?= Html::a('Login', ['/site/login'], ['class' => 'btn btn-success']) ?></p>
                    <p><?= Html::a('Sign Up', ['/site/signup'], ['class' => 'btn btn-primary']) ?></p>
                <?php endif; ?>

            <div class="col-lg-4">
                <!-- Space kosong -->
            </div>
        </div>
    </div>
</div>
