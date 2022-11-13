<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterDatapasien $model */

$this->title = 'Update Master Datapasien: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Master Datapasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-datapasien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
