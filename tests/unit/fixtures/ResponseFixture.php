<?php

namespace tests\unit\fixtures;
use yii\test\ActiveFixture;

class ResponseFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Response';
    public $dataFile = '@tests/unit/fixtures/data/response.php';
}
