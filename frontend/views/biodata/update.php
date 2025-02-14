<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Biodata $model */
/** @var frontend\models\Pekerjaan[] $pekerjaans */
/** @var frontend\models\Pendidikan[] $pendidikan */
/** @var frontend\models\Pelatihan[] $pelatihan */

$this->title = 'Update Biodata ';
// $this->title = 'Update Biodata: ' . $model->id_pelamar;
// $this->params['breadcrumbs'][] = ['label' => 'Biodatas', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id_pelamar, 'url' => ['view', 'id_pelamar' => $model->id_pelamar]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="biodata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= $this->render('_form', [
        'model' => $model,
        'pekerjaans' => $pekerjaans,
        'pendidikan' => $pendidikan,
        'pelatihan' => $pelatihan,
    ]) ?>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->username === 'admin'): ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-secondary']) ?>
    <?php else: ?>
        <?= Html::a('Back', ['/'], ['class' => 'btn btn-secondary']) ?>
    <?php endif; ?>
    </p>

</div>

