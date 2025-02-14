<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Pekerjaan $model */

$this->title = $model->id_pekerjaan;
$this->params['breadcrumbs'][] = ['label' => 'Pekerjaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pekerjaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_pekerjaan' => $model->id_pekerjaan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pekerjaan' => $model->id_pekerjaan], [
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
            'id_pekerjaan',
            'perusahaan_riwayat',
            'posisi_riwayat',
            'salary_riwayat',
            'tahun_pekerjaan_riwayat',
            'id_pelamar',
        ],
    ]) ?>

</div>
