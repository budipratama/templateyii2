<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ConfigurationWeb;

/**
 * ConfigurationWebSearch represents the model behind the search form of `backend\models\ConfigurationWeb`.
 */
class ConfigurationWebSearch extends ConfigurationWeb
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tcw_id'], 'integer'],
            [['tcw_name', 'tcw_value'], 'safe'],
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
        $query = ConfigurationWeb::find();

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
            'tcw_id' => $this->tcw_id,
        ]);

        $query->andFilterWhere(['like', 'tcw_name', $this->tcw_name])
            ->andFilterWhere(['like', 'tcw_value', $this->tcw_value]);

        return $dataProvider;
    }
}
