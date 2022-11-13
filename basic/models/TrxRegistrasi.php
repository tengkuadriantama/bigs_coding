<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trx_registrasi".
 *
 * @property int $id
 * @property string $waktu_registrasi
 * @property string $no_registrasi
 * @property int $id_pasien
 * @property string $jenis_registrasi
 * @property string $layanan
 * @property string $jenis_pembayaran
 * @property string $status_registrasi
 * @property string $waktu_mulai_pelayanan
 * @property string $waktu_selesai_pelayanan
 * @property string $petugas_pendaftaran
 */
class TrxRegistrasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trx_registrasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['waktu_registrasi', 'no_registrasi', 'id_pasien', 'jenis_registrasi', 'layanan', 'jenis_pembayaran', 'status_registrasi', 'waktu_mulai_pelayanan', 'waktu_selesai_pelayanan', 'petugas_pendaftaran'], 'required'],
            [['waktu_registrasi', 'waktu_mulai_pelayanan', 'waktu_selesai_pelayanan'], 'safe'],
            [['id_pasien'], 'integer'],
            [['status_registrasi'], 'string'],
            [['no_registrasi', 'jenis_registrasi', 'layanan', 'jenis_pembayaran', 'petugas_pendaftaran'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'waktu_registrasi' => 'Waktu Registrasi',
            'no_registrasi' => 'No Registrasi',
            'id_pasien' => 'Nama Pasien',
            'jenis_registrasi' => 'Jenis Registrasi',
            'layanan' => 'Layanan',
            'jenis_pembayaran' => 'Jenis Pembayaran',
            'status_registrasi' => 'Status Registrasi',
            'waktu_mulai_pelayanan' => 'Waktu Mulai Pelayanan',
            'waktu_selesai_pelayanan' => 'Waktu Selesai Pelayanan',
            'petugas_pendaftaran' => 'Petugas Pendaftaran',
        ];
    }

    public function GetPasien()
    {
        return $this->HasOne(MasterDatapasien::class, ['id' => 'id_pasien']);
    }
}
