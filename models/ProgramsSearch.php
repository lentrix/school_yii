<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Programs;

/**
 * ProgramsSearch represents the model behind the search form about `app\models\Programs`.
 */
class ProgramsSearch extends Programs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'collegeId'], 'integer'],
            [['shortName', 'longName', 'major', 'track'], 'safe'],
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
        $query = Programs::find();

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
            'collegeId' => $this->collegeId,
        ]);

        $query->andFilterWhere(['like', 'shortName', $this->shortName])
            ->andFilterWhere(['like', 'longName', $this->longName])
            ->andFilterWhere(['like', 'major', $this->major])
            ->andFilterWhere(['like', 'track', $this->track]);

        return $dataProvider;
    }
}
