<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TrxRegistrasi $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Trx Registrasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trx-registrasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'waktu_registrasi',
            'no_registrasi',
            'pasien.nama',
            'pasien.jenis_kelamin',
            'pasien.tanggal_lahir',
            'jenis_registrasi',
            'layanan',
            'jenis_pembayaran',
            'status_registrasi',
            'waktu_mulai_pelayanan',
            'waktu_selesai_pelayanan',
            'petugas_pendaftaran',
        ],
    ]) ?>

</div>