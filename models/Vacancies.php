<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacancies".
 *
 * @property int $id
 * @property string $title
 * @property string $date
 * @property string $city
 * @property string $company
 * @property int $salary
 * @property string $description
 * @property string $image
 * @property int $response_id
 * @property int $status
 * @property int $category_id
 * @property int $user_id
 *
 * @property Response[] $responses
 */
class Vacancies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['salary', 'response_id', 'status', 'category_id', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['title', 'city', 'company', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'date' => 'Date',
            'city' => 'City',
            'company' => 'Company',
            'salary' => 'Salary',
            'description' => 'Description',
            'image' => 'Image',
            'response_id' => 'Response ID',
            'status' => 'Status',
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponses()
    {
        return $this->hasMany(Response::className(), ['vacancy_id' => 'id']);
    }
}
