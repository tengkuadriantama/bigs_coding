<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrxRegistrasi;

/**
 * TrxRegistrasiSearch represents the model behind the search form of `app\models\TrxRegistrasi`.
 */
class TrxRegistrasiSearch extends TrxRegistrasi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_pasien'], 'integer'],
            [['waktu_registrasi', 'no_registrasi', 'jenis_registrasi', 'layanan', 'jenis_pembayaran', 'status_registrasi', 'waktu_mulai_pelayanan', 'waktu_selesai_pelayanan', 'petugas_pendaftaran'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TrxRegistrasi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'waktu_registrasi' => $this->waktu_registrasi,
            'id_pasien' => $this->id_pasien,
            'waktu_mulai_pelayanan' => $this->waktu_mulai_pelayanan,
            'waktu_selesai_pelayanan' => $this->waktu_selesai_pelayanan,
        ]);

        $query->andFilterWhere(['like', 'no_registrasi', $this->no_registrasi])
            ->andFilterWhere(['like', 'jenis_registrasi', $this->jenis_registrasi])
            ->andFilterWhere(['like', 'layanan', $this->layanan])
            ->andFilterWhere(['like', 'jenis_pembayaran', $this->jenis_pembayaran])
            ->andFilterWhere(['like', 'status_registrasi', $this->status_registrasi])
            ->andFilterWhere(['like', 'petugas_pendaftaran', $this->petugas_pendaftaran]);

        return $dataProvider;
    }
}
