<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\TrxRegistrasi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trx-registrasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--  -->

    <?= $form->field($model, 'no_registrasi')->textInput(['maxlength' => true]) ?>

    <?php
    $dataPost = ArrayHelper::map(\app\models\MasterDatapasien::find()->asArray()->all(), 'id', 'nama');
    echo $form->field($model, 'id_pasien')
        ->dropDownList(
            $dataPost,
            ['id' => 'nama']
        );
    ?>

    <?= $form->field($model, 'jenis_registrasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'layanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_pembayaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_registrasi')->dropDownList(['Aktif' => 'Aktif', 'Tutup Kunjungan' => 'Tutup Kunjungan',], ['prompt' => '']) ?>

    <?= $form->field($model, 'waktu_selesai_pelayanan')->textInput() ?>

    <?= $form->field($model, 'petugas_pendaftaran')->textInput(['maxlength' => true]) ?>


    <br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>