<?php
use yii\helpers\Url;

/* @var $vacancy app\controllers\SiteController */
/* @var $responses app\controllers\SiteController */
/* @var $responseForm app\controllers\SiteController */
?>
<div class="container">
    <div class="row">
        <h1><?= $vacancy->title ?></h1>

        <div>
            <?= $vacancy->description ?>
        </div>

        <?= $this->render('/partials/response', [
            'vacancy' => $vacancy,
            'responses' => $responses,
            'responseForm' => $responseForm
        ])?>
    </div>
</div>
