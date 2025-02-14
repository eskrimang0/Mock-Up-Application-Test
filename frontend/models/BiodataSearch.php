<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Biodata;

/**
 * BiodataSearch represents the model behind the search form of `app\models\Biodata`.
 */
class BiodataSearch extends Biodata
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pelamar'], 'integer'],
            [['posisi_pelamar', 'nama_pelamar', 'ktp_pelamar', 'ttl_pelamar', 'jk_pelamar', 'agama_pelamar', 'goldar_pelamar', 'status_pelamar', 'alamat_ktp_pelamar', 'alamat_tinggal_pelamar', 'email_pelamar', 'tlp_pelamar', 'tlp2_pelamar', 'skill_pelamar'], 'safe'],
            [['ekspektasi_salary_pelamar'], 'number'],
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
        $query = Biodata::find();

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
            'id_pelamar' => $this->id_pelamar,
            'ekspektasi_salary_pelamar' => $this->ekspektasi_salary_pelamar,
        ]);

        $query
            ->andFilterWhere(['like', 'posisi_pelamar', $this->posisi_pelamar])
            ->andFilterWhere(['like', 'nama_pelamar', $this->nama_pelamar])
            ->andFilterWhere(['like', 'ktp_pelamar', $this->ktp_pelamar])
            ->andFilterWhere(['like', 'ttl_pelamar', $this->ttl_pelamar])
            ->andFilterWhere(['like', 'jk_pelamar', $this->jk_pelamar])
            ->andFilterWhere(['like', 'agama_pelamar', $this->agama_pelamar])
            ->andFilterWhere(['like', 'goldar_pelamar', $this->goldar_pelamar])
            ->andFilterWhere(['like', 'status_pelamar', $this->status_pelamar])
            ->andFilterWhere(['like', 'alamat_ktp_pelamar', $this->alamat_ktp_pelamar])
            ->andFilterWhere(['like', 'alamat_tinggal_pelamar', $this->alamat_tinggal_pelamar])
            ->andFilterWhere(['like', 'email_pelamar', $this->email_pelamar])
            ->andFilterWhere(['like', 'tlp_pelamar', $this->tlp_pelamar])
            ->andFilterWhere(['like', 'tlp2_pelamar', $this->tlp2_pelamar])
            ->andFilterWhere(['like', 'skill_pelamar', $this->skill_pelamar]);

        return $dataProvider;
    }
}
