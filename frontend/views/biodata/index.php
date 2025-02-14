<?php

use frontend\models\Biodata;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\BiodataSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Biodatas';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodata-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Biodata', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_pelamar',
            'posisi_pelamar',
            'nama_pelamar',
            //'ktp_pelamar',
            'ttl_pelamar',
            //'jk_pelamar',
            //'agama_pelamar',
            //'goldar_pelamar',
            //'status_pelamar',
            //'alamat_ktp_pelamar',
            //'alamat_tinggal_pelamar',
            //'email_pelamar:email',
            //'tlp_pelamar',
            //'tlp2_pelamar',
            //'skill_pelamar:ntext',
            //'ekspektasi_salary_pelamar',
            [
                'class' => ActionColumn::className(),
                'template' => '{view}',
                'urlCreator' => function ($action, Biodata $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id_pelamar]);
                 }
            ],
        ],
    ]); ?>


</div>
