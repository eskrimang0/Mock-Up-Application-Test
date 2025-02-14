<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\Biodata $model */
/** @var yii\data\ActiveDataProvider $pekerjaanProvider */
/** @var yii\data\ActiveDataProvider $pendidikanProvider */
/** @var yii\data\ActiveDataProvider $pelatihanProvider */

// $this->title = $model->id_pelamar;
// $this->params['breadcrumbs'][] = ['label' => 'Biodatas', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="biodata-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('Update', ['update', 'id' => $model->id_pelamar], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id_pelamar], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
        
    ]) ?>
    
    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->username === 'admin'): ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-secondary']) ?>
    <?php else: ?>
        <?= Html::a('Back', ['/'], ['class' => 'btn btn-secondary']) ?>
    <?php endif; ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pelamar',
            'posisi_pelamar',
            'nama_pelamar',
            'ktp_pelamar',
            'ttl_pelamar',
            'jk_pelamar',
            'agama_pelamar',
            'goldar_pelamar',
            'status_pelamar',
            'alamat_ktp_pelamar',
            'alamat_tinggal_pelamar',
            'email_pelamar:email',
            'tlp_pelamar',
            'tlp2_pelamar',
            'skill_pelamar:ntext',
            'ekspektasi_salary_pelamar',
        ],
    ]) ?>

    <h2>Pekerjaan</h2>
    <?= GridView::widget([
        'dataProvider' => $pekerjaanProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'perusahaan_riwayat', 
            'posisi_riwayat', 
            'salary_riwayat', 
            'tahun_pekerjaan_riwayat',
        ],
    ]); ?>

    <h2>Pendidikan</h2>
    <?= GridView::widget([
        'dataProvider' => $pendidikanProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'pendidikan_riwayat', 
            'nama_pendidikan_riwayat', 
            'jurusan_pendidikan_riwayat', 
            'tahun_lulus_riwayat', 
            'ipk_riwayat',
        ],
    ]); ?>

    <h2>Pelatihan</h2>
    <?= GridView::widget([
        'dataProvider' => $pelatihanProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nama_pelatihan', 
            'sertifikat_pelatihan', 
            'tahun_pelatihan',
        ],
    ]); ?>

</div>
