<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Terapia;

/**
 * TerapiaSearch represents the model behind the search form of `app\models\Terapia`.
 */
class TerapiaSearch extends Terapia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUtente', 'idLogopedista'], 'safe'],
            [['ID'], 'string'],
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
        $query = Terapia::find();

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
            'ID' => $this->ID,
        ]);

        $query->andFilterWhere(['like', 'idUtente', $this->idUtente])
            ->andFilterWhere(['like', 'idLogopedista', $this->idLogopedista]);

        return $dataProvider;
    }
}
