<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Codes;

/**
 * CodesSearch represents the model behind the search form of `common\models\Codes`.
 */
class CodesSearch extends Codes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'code_1', 'code_2', 'code_3', 'name', 'param_1', 'param_2', 'param_3', 'param_4', 'param_5', 'table_name'], 'safe'],
            [['type_id', 'param_id', 'params'], 'integer'],
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
        $query = Codes::find();

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
            'type_id' => $this->type_id,
            'param_id' => $this->param_id,
            'params' => $this->params,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'code_1', $this->code_1])
            ->andFilterWhere(['like', 'code_2', $this->code_2])
            ->andFilterWhere(['like', 'code_3', $this->code_3])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'param_1', $this->param_1])
            ->andFilterWhere(['like', 'param_2', $this->param_2])
            ->andFilterWhere(['like', 'param_3', $this->param_3])
            ->andFilterWhere(['like', 'param_4', $this->param_4])
            ->andFilterWhere(['like', 'param_5', $this->param_5])
            ->andFilterWhere(['like', 'table_name', $this->table_name]);

        return $dataProvider;
    }
}
