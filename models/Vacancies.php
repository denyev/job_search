<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

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
 * @property int $response_id
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
            [['title', 'city', 'company'], 'string', 'max' => 255],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['salary', 'response_id', 'category_id', 'user_id'], 'integer'],
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
            'title' => Yii::t('app', 'Название'),
            'date' => Yii::t('app', 'Дата'),
            'city' => Yii::t('app', 'Город'),
            'company' => Yii::t('app', 'Компания'),
            'salary' => Yii::t('app', 'Зарплата'),
            'description' => Yii::t('app', 'Описание'),
            'response_id' => Yii::t('app', 'Response ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponses()
    {
        return $this->hasMany(Response::className(), ['vacancy_id'=>'id']);
    }
}
