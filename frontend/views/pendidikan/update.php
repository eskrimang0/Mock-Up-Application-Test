<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Pendidikan $model */

$this->title = 'Update Pendidikan: ' . $model->id_pendidikan;
$this->params['breadcrumbs'][] = ['label' => 'Pendidikans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pendidikan, 'url' => ['view', 'id_pendidikan' => $model->id_pendidikan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pendidikan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
