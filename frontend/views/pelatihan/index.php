<?php

use frontend\models\Pelatihan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\PelatihanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pelatihans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelatihan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pelatihan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pelatihan',
            'nama_pelatihan',
            'sertifikat_pelatihan',
            'tahun_pelatihan',
            'id_pelamar',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pelatihan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pelatihan' => $model->id_pelatihan]);
                 }
            ],
        ],
    ]); ?>


</div>
