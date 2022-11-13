<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TrxRegistrasi $model */

$this->title = 'Create Trx Registrasi';
$this->params['breadcrumbs'][] = ['label' => 'Trx Registrasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trx-registrasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
