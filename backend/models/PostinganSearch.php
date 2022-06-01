<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Postingan;

/**
 * PostinganSearch represents the model behind the search form of `backend\models\Postingan`.
 */
class PostinganSearch extends Postingan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'count_like', 'status'], 'integer'],
            [['caption', 'photo', 'tanggal_posting'], 'safe'],
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
        $query = Postingan::find();

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
            'id_user' => $this->id_user,
            'count_like' => $this->count_like,
            'tanggal_posting' => $this->tanggal_posting,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'caption', $this->caption])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
