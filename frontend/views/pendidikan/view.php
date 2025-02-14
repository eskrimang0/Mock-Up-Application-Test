<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Pendidikan $model */

$this->title = $model->id_pendidikan;
$this->params['breadcrumbs'][] = ['label' => 'Pendidikans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pendidikan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_pendidikan' => $model->id_pendidikan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pendidikan' => $model->id_pendidikan], [
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
            'id_pendidikan',
            'pendidikan_riwayat',
            'nama_pendidikan_riwayat',
            'jurusan_pendidikan_riwayat',
            'tahun_lulus_riwayat',
            'ipk_riwayat',
            'id_pelamar',
        ],
    ]) ?>

</div>
