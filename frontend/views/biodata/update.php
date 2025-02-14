<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Biodata $model */

$this->title = 'Update Biodata: ' . $model->id_pelamar;
$this->params['breadcrumbs'][] = ['label' => 'Biodatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pelamar, 'url' => ['view', 'id_pelamar' => $model->id_pelamar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="biodata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
