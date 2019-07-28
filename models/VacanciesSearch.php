<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vacancies;

/**
 * VacanciesSearch represents the model behind the search form of `app\models\Vacancies`.
 */
class VacanciesSearch extends Vacancies
{
    public $min_salary;
    public $max_salary;
    public $min_date;
    public $max_date;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'salary', 'min_salary', 'max_salary', 'response_id', 'category_id', 'user_id'], 'integer'],
            [['title', 'city', 'company', 'description', 'image'], 'safe'],
            [['date', 'min_date', 'max_date',], 'date', 'format' => 'php:Y-m-d'],
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
        $query = Vacancies::find();

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
            'response_id' => $this->response_id,
            'category_id' => $this->category_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere([
                'and',
                ['>=', 'date', $this->min_date],
                ['<=', 'date', $this->max_date],
            ])
            ->andFilterWhere([
                'and',
                ['>=', 'salary', $this->min_salary],
                ['<=', 'salary', $this->max_salary],
            ])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
