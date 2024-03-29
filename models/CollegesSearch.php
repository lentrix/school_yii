<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Colleges;

/**
 * CollegesSearch represents the model behind the search form about `app\models\Colleges`.
 */
class CollegesSearch extends Colleges
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['shortName', 'longName', 'head', 'headTitle'], 'safe'],
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
        $query = Colleges::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'shortName', $this->shortName])
            ->andFilterWhere(['like', 'longName', $this->longName])
            ->andFilterWhere(['like', 'head', $this->head])
            ->andFilterWhere(['like', 'headTitle', $this->headTitle]);

        return $dataProvider;
    }
}
