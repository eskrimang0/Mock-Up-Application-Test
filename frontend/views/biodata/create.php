<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Biodata $model */

// $this->title = 'Create Biodata';
// $this->params['breadcrumbs'][] = ['label' => 'Biodatas', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="biodata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>


</div>
