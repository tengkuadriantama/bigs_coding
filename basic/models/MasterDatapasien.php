<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_datapasien".
 *
 * @property int $id
 * @property string $no_rekam_medis
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $tanggal_lahir
 */
class MasterDatapasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_datapasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rekam_medis', 'nama', 'jenis_kelamin', 'tanggal_lahir'], 'required'],
            [['jenis_kelamin'], 'string'],
            [['no_rekam_medis', 'nama'], 'string', 'max' => 250],
            [['tanggal_lahir'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_rekam_medis' => 'No Rekam Medis',
            'nama' => 'Nama Pasien',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tanggal_lahir' => 'Tanggal Lahir',
        ];
    }
}
