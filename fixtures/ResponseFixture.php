<?php

namespace app\fixtures;
use yii\test\ActiveFixture;

class ResponseFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Response';
    public $dataFile = '@app/fixtures/data/response.php';
}
