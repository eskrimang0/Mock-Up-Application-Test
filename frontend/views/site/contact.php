<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Hubungi kami jika ada pertanyaan atau kendala.
        <br> 10th Floor, Wisma SMR, 
        <br> Jl. Yos Sudarso Kav 85 No.89, Sunter Jaya, 
        <br> Kec. Tj. Priok, Jkt Utara, 
        <br> Daerah Khusus Ibukota Jakarta 14360
    </p>

</div>
