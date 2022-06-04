<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diagnosi;

/**
 * DiagnosiSearch represents the model behind the search form of `app\models\Diagnosi`.
 */
class DiagnosiSearch extends Diagnosi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUtente', 'idLogopedista', 'idCaregiver', 'nomeUtente', 'cognomeUtente', 'dataDiagnosi', 'descrizioneDiagnosi'], 'safe'],
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
        $query = Diagnosi::find();

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
            'dataDiagnosi' => $this->dataDiagnosi,
        ]);

        $query->andFilterWhere(['like', 'idUtente', $this->idUtente])
            ->andFilterWhere(['like', 'idLogopedista', $this->idLogopedista])
            ->andFilterWhere(['like', 'idCaregiver', $this->idCaregiver])
            ->andFilterWhere(['like', 'nomeUtente', $this->nomeUtente])
            ->andFilterWhere(['like', 'cognomeUtente', $this->cognomeUtente])
            ->andFilterWhere(['like', 'descrizioneDiagnosi', $this->descrizioneDiagnosi]);

        return $dataProvider;
    }
}
