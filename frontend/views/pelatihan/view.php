<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Pelatihan $model */

$this->title = $model->id_pelatihan;
$this->params['breadcrumbs'][] = ['label' => 'Pelatihans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pelatihan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_pelatihan' => $model->id_pelatihan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pelatihan' => $model->id_pelatihan], [
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
            'id_pelatihan',
            'nama_pelatihan',
            'sertifikat_pelatihan',
            'tahun_pelatihan',
            'id_pelamar',
        ],
    ]) ?>

</div>
