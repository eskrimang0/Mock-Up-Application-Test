<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Biodata $model */

$this->title = $model->id_pelamar;
$this->params['breadcrumbs'][] = ['label' => 'Biodatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="biodata-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pelamar], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pelamar' => $model->id_pelamar], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
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

</div>
