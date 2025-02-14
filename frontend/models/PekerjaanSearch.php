<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pekerjaan;

/**
 * PekerjaanSearch represents the model behind the search form of `frontend\models\Pekerjaan`.
 */
class PekerjaanSearch extends Pekerjaan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pekerjaan', 'id_pelamar'], 'integer'],
            [['perusahaan_riwayat', 'posisi_riwayat', 'tahun_pekerjaan_riwayat'], 'safe'],
            [['salary_riwayat'], 'number'],
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
        $query = Pekerjaan::find();

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
            'id_pekerjaan' => $this->id_pekerjaan,
            'salary_riwayat' => $this->salary_riwayat,
            'id_pelamar' => $this->id_pelamar,
        ]);

        $query->andFilterWhere(['like', 'perusahaan_riwayat', $this->perusahaan_riwayat])
            ->andFilterWhere(['like', 'posisi_riwayat', $this->posisi_riwayat])
            ->andFilterWhere(['like', 'tahun_pekerjaan_riwayat', $this->tahun_pekerjaan_riwayat]);

        return $dataProvider;
    }
}
