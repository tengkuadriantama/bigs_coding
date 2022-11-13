<?php

use app\models\TrxRegistrasi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\export\ExportMenu;



/** @var yii\web\View $this */
/** @var app\models\TrxRegistrasiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Trx Registrasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trx-registrasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Registrasi', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cetak PDF', ['report'], ['class' => 'btn btn-info']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'waktu_registrasi',
            'no_registrasi',
            'pasien.nama',
            'jenis_registrasi',
            'layanan',
            'jenis_pembayaran',
            'status_registrasi',
            'waktu_mulai_pelayanan',
            'waktu_selesai_pelayanan',
            'petugas_pendaftaran',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, TrxRegistrasi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>