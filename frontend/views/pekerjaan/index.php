<?php

use frontend\models\Pekerjaan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\PekerjaanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pekerjaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pekerjaan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pekerjaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pekerjaan',
            'perusahaan_riwayat',
            'posisi_riwayat',
            'salary_riwayat',
            'tahun_pekerjaan_riwayat',
            //'id_pelamar',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pekerjaan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pekerjaan' => $model->id_pekerjaan]);
                 }
            ],
        ],
    ]); ?>


</div>
