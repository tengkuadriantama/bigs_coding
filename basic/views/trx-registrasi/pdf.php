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

$this->title = 'Data Registrasi';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    #data {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #data id,
    #data th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;

    }
</style>
<div class="trx-registrasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <table id="data">

        <tr>
            <th>No</th>
            <th>Waktu Registrasi</th>
            <th>No Registrasi</th>
            <th>No Rekam Medis</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Registrasi</th>
            <th>Layanan</th>
            <th>Jenis Pembayaran</th>
            <th>Status Registrasi</th>
            <th>Waktu Mulai Pelayanan</th>
            <th>Waktu Selesai Pelayanan</th>
            <th>Petugas Pendaftaran</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($dataProvider->getModels() as $model) { ?>

            <tr>
                <td><?= $i++ ?></td>
                <td><?= $model->waktu_registrasi ?> </td>
                <td><?= $model->no_registrasi ?> </td>
                <td><?= $model->pasien->no_rekam_medis ?> </td>
                <td><?= $model->pasien->nama ?> </td>
                <td><?= $model->pasien->jenis_kelamin ?> </td>
                <td><?= $model->pasien->tanggal_lahir ?> </td>
                <td><?= $model->jenis_registrasi ?> </td>
                <td><?= $model->layanan ?> </td>
                <td><?= $model->jenis_pembayaran ?> </td>
                <td><?= $model->status_registrasi ?> </td>
                <td><?= $model->waktu_mulai_pelayanan ?> </td>
                <td><?= $model->waktu_selesai_pelayanan ?> </td>
                <td><?= $model->petugas_pendaftaran ?> </td>
            </tr>


        <?php } ?>
        <tr>

        </tr>
    </table>


</div>