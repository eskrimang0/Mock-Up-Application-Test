<?php

use frontend\models\Userdb;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\UserdbSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Userdbs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userdb-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Userdb', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'email_user:email',
            'password_user',
            'role_user',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Userdb $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'email_user' => $model->email_user]);
                 }
            ],
        ],
    ]); ?>


</div>
