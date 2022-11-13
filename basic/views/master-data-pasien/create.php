<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MasterDatapasien $model */

$this->title = 'Create Master Datapasien';
$this->params['breadcrumbs'][] = ['label' => 'Master Datapasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-datapasien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
