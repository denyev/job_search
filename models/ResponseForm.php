<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * @property string $name
 * @property string $phone
 * @property int $salary
 * @property int $vacancy_id
 *
 * @property Vacancies $vacancy
 */
class ResponseForm extends Model
{
    public $name;
    public $phone;
    public $salary;

    public function rules()
    {
        return [
            [['name', 'phone', 'salary'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['phone', 'salary'], 'integer'],
        ];
    }

    /**
     * Save a response in the table `response` of a database.
     *
     * @param int $vacancy_id
     * @return bool
     */
    public function saveResponse($vacancy_id)
    {
        $response = new Response;

        $response->name = $this->name;
        $response->phone = $this->phone;
        $response->salary = $this->salary;
        $response->vacancy_id = $vacancy_id;

        return $response->save();
    }
}
