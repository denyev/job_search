<?php

namespace app\fixtures;
use yii\test\ActiveFixture;

class VacanciesFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Vacancies';
    public $dataFile = '@app/fixtures/data/vacancies.php';
}
