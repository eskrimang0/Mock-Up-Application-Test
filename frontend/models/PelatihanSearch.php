<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pelatihan;

/**
 * PelatihanSearch represents the model behind the search form of `frontend\models\Pelatihan`.
 */
class PelatihanSearch extends Pelatihan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pelatihan', 'id_pelamar'], 'integer'],
            [['nama_pelatihan', 'sertifikat_pelatihan', 'tahun_pelatihan'], 'safe'],
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
        $query = Pelatihan::find();

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
            'id_pelatihan' => $this->id_pelatihan,
            'id_pelamar' => $this->id_pelamar,
        ]);

        $query->andFilterWhere(['like', 'nama_pelatihan', $this->nama_pelatihan])
            ->andFilterWhere(['like', 'sertifikat_pelatihan', $this->sertifikat_pelatihan])
            ->andFilterWhere(['like', 'tahun_pelatihan', $this->tahun_pelatihan]);

        return $dataProvider;
    }
}
