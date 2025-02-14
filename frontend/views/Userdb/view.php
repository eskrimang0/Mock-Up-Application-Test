<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Userdb $model */

$this->title = $model->email_user;
$this->params['breadcrumbs'][] = ['label' => 'Userdbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="userdb-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'email_user' => $model->email_user], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'email_user' => $model->email_user], [
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
            'email_user:email',
            'password_user',
            'role_user',
        ],
    ]) ?>

</div>
