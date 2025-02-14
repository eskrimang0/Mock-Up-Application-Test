<?php

use frontend\models\Pendidikan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\PedidikanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pendidikans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendidikan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pendidikan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pendidikan',
            'pendidikan_riwayat',
            'nama_pendidikan_riwayat',
            'jurusan_pendidikan_riwayat',
            'tahun_lulus_riwayat',
            //'ipk_riwayat',
            //'id_pelamar',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pendidikan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pendidikan' => $model->id_pendidikan]);
                 }
            ],
        ],
    ]); ?>


</div>
