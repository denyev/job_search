<?php

namespace tests\unit\fixtures;
use yii\test\ActiveFixture;

class VacanciesFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Vacancies';
    public $dataFile = '@tests/unit/fixtures/data/vacancies.php';
}
