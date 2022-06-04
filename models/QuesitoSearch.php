<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Quesito;

/**
 * QuesitoSearch represents the model behind the search form of `app\models\Quesito`.
 */
class QuesitoSearch extends Quesito
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'esercizio_id'], 'integer'],
            [['domanda', 'opzioni_risposta', 'risposta_corretta', 'domanda_immagine'], 'safe'],
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
        $query = Quesito::find();

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
            'esercizio_id' => $this->esercizio_id,
        ]);

        $query->andFilterWhere(['like', 'domanda', $this->domanda])
            ->andFilterWhere(['like', 'opzioni_risposta', $this->opzioni_risposta])
            ->andFilterWhere(['like', 'risposta_corretta', $this->risposta_corretta])
            ->andFilterWhere(['like', 'domanda_immagine', $this->domanda_immagine]);

        return $dataProvider;
    }
}
