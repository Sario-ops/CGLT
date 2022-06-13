<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Assegnato;
use yii\data\ActiveDataProvider;

/**
 * AssegnatoSearch represents the model behind the search form of `app\models\Assegnato`.
 */
class AssegnatoSearch extends Assegnato
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idEsercizio', 'valutazione'], 'integer'],
            [['idTerapia', 'risposta', 'stato'], 'safe'],
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
        $query = Assegnato::find();

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
            'idEsercizio' => $this->idEsercizio,
            'valutazione' => $this->valutazione,
        ]);

        $query->andFilterWhere(['like', 'idTerapia', $this->idTerapia])
            ->andFilterWhere(['like', 'risposta', $this->risposta])
            ->andFilterWhere(['like', 'stato', $this->stato]);

        return $dataProvider;
    }
}
