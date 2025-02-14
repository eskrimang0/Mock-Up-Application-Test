<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Userdb;

/**
 * UserdbSearch represents the model behind the search form of `app\models\Userdb`.
 */
class UserdbSearch extends Userdb
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email_user', 'password_user', 'role_user'], 'safe'],
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
        $query = Userdb::find();

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
        $query->andFilterWhere(['like', 'email_user', $this->email_user])
            ->andFilterWhere(['like', 'password_user', $this->password_user])
            ->andFilterWhere(['like', 'role_user', $this->role_user]);

        return $dataProvider;
    }
}
