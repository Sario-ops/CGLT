<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EsercizioAssegnato;

/**
 * EsercizioAssegnatoSearch represents the model behind the search form of `app\models\EsercizioAssegnato`.
 */
class EsercizioAssegnatoSearch extends EsercizioAssegnato
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTerapia', 'idEsercizio'], 'integer'],
            [['risposta'], 'safe'],
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
        $query = EsercizioAssegnato::find();

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
            'idTerapia' => $this->idTerapia,
            'idEsercizio' => $this->idEsercizio,
        ]);

        $query->andFilterWhere(['like', 'risposta', $this->risposta]);

        return $dataProvider;
    }
}
