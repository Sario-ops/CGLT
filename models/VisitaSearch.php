<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Visita;

/**
 * VisitaSearch represents the model behind the search form of `app\models\Visita`.
 */
class VisitaSearch extends Visita
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUtente', 'idLogopedista', 'dataPrenotazione', 'dataVisita', 'oraVisita'], 'safe'],
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
        $query = Visita::find();

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
            'dataPrenotazione' => $this->dataPrenotazione,
            'dataVisita' => $this->dataVisita,
            'oraVisita' => $this->oraVisita,
        ]);

        $query->andFilterWhere(['like', 'idUtente', $this->idUtente])
            ->andFilterWhere(['like', 'idLogopedista', $this->idLogopedista])
            ->andFilterWhere(['like', 'nomeUtente', $this->nomeUtente])
            ->andFilterWhere(['like', 'cognomeUtente', $this->cognomeUtente]);

        return $dataProvider;
    }
}
