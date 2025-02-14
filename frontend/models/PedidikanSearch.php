<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pendidikan;

/**
 * PedidikanSearch represents the model behind the search form of `frontend\models\Pendidikan`.
 */
class PedidikanSearch extends Pendidikan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pendidikan', 'id_pelamar'], 'integer'],
            [['pendidikan_riwayat', 'nama_pendidikan_riwayat', 'jurusan_pendidikan_riwayat', 'tahun_lulus_riwayat', 'ipk_riwayat'], 'safe'],
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
        $query = Pendidikan::find();

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
            'id_pendidikan' => $this->id_pendidikan,
            'id_pelamar' => $this->id_pelamar,
        ]);

        $query->andFilterWhere(['like', 'pendidikan_riwayat', $this->pendidikan_riwayat])
            ->andFilterWhere(['like', 'nama_pendidikan_riwayat', $this->nama_pendidikan_riwayat])
            ->andFilterWhere(['like', 'jurusan_pendidikan_riwayat', $this->jurusan_pendidikan_riwayat])
            ->andFilterWhere(['like', 'tahun_lulus_riwayat', $this->tahun_lulus_riwayat])
            ->andFilterWhere(['like', 'ipk_riwayat', $this->ipk_riwayat]);

        return $dataProvider;
    }
}
