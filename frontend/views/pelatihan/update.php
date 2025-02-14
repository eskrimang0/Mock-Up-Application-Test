<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Pelatihan $model */

$this->title = 'Update Pelatihan: ' . $model->id_pelatihan;
$this->params['breadcrumbs'][] = ['label' => 'Pelatihans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pelatihan, 'url' => ['view', 'id_pelatihan' => $model->id_pelatihan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelatihan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
