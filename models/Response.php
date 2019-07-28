<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "response".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $salary
 * @property int $vacancy_id
 *
 * @property Vacancies $vacancy
 */
class Response extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'response';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'salary'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['phone', 'salary', 'vacancy_id'], 'integer'],
            [
                ['vacancy_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Vacancies::className(),
                'targetAttribute' => ['vacancy_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Имя'),
            'phone' => Yii::t('app', 'Телефон'),
            'salary' => Yii::t('app', 'Зарплата'),
            'vacancy_id' => Yii::t('app', 'Vacancy ID')
        ];
    }
}
