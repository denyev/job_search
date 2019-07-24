<?php
use yii\helpers\Url;

/* @var $vacancy app\controllers\SiteController */
/* @var $responses app\controllers\SiteController */
/* @var $responseForm app\controllers\SiteController */
?>
<div class="container">
    <div class="row">
        <img src="<?= $vacancy->getImage(); ?>"
             width="800" height="400"
             alt="Изображение для вакансии «<?= $vacancy->title ?>»">

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
