<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Userdb $model */

$this->title = 'Update Userdb: ' . $model->email_user;
$this->params['breadcrumbs'][] = ['label' => 'Userdbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->email_user, 'url' => ['view', 'email_user' => $model->email_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userdb-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
