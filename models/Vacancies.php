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
            [['title', 'company', 'description'], 'required'],
            [['title', 'city', 'company', 'image'], 'string', 'max' => 255],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['salary', 'response_id', 'status', 'category_id', 'user_id'], 'integer'],
            [['description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        // TODO: distinguish required fields
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'date' => Yii::t('app', 'Date'),
            'city' => Yii::t('app', 'City'),
            'company' => Yii::t('app', 'Company'),
            'salary' => Yii::t('app', 'Salary'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'response_id' => Yii::t('app', 'Response ID'),
            'status' => Yii::t('app', 'Status'),
            'category_id' => Yii::t('app', 'Category ID'),
            'user_id' => Yii::t('app', 'User ID'),
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
