<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Veiculo;

/**
 * VeiculoSearch represents the model behind the search form about `app\models\Veiculo`.
 */
class VeiculoSearch extends Veiculo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_veiculo'], 'integer'],
            [['placa', 'marca', 'modelo', 'ano', 'cor', 'detalhes'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Veiculo::find();

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
            'id_veiculo' => $this->id_veiculo,
            'ano' => $this->ano,
        ]);

        $query->andFilterWhere(['like', 'placa', $this->placa])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'cor', $this->cor])
            ->andFilterWhere(['like', 'detalhes', $this->detalhes]);

        return $dataProvider;
    }
}
