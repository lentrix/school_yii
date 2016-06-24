<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Teachers;

/**
 * TeachersSearch represents the model behind the search form about `app\models\Teachers`.
 */
class TeachersSearch extends Teachers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userId'], 'integer'],
            [['lastName', 'firstName', 'salutation', 'street', 'city', 'state', 'phone', 'specialty'], 'safe'],
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
        $query = Teachers::find();

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
            'userId' => $this->userId,
        ]);

        $query->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'salutation', $this->salutation])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'specialty', $this->specialty]);

        return $dataProvider;
    }
}
