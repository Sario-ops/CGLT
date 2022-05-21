<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Logopedista;

/**
 * LogopedistaSearch represents the model behind the search form of `app\models\Logopedista`.
 */
class LogopedistaSearch extends Logopedista
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'integer'],
            [['name', 'surname', 'Codice_catastale_comune', 'CODICE_FISCALE', 'EMAIL', 'PASSWORD'], 'safe'],
            [['giorno_nascita', 'mese_di_nascita', 'anno_di_nascita'], 'number'],
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
        $query = Logopedista::find();

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
            'code' => $this->code,
            'giorno_nascita' => $this->giorno_nascita,
            'mese_di_nascita' => $this->mese_di_nascita,
            'anno_di_nascita' => $this->anno_di_nascita,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'Codice_catastale_comune', $this->Codice_catastale_comune])
            ->andFilterWhere(['like', 'CODICE_FISCALE', $this->CODICE_FISCALE])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'PASSWORD', $this->PASSWORD]);

        return $dataProvider;
    }
}
