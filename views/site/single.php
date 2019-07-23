<?php
use yii\helpers\Url;
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
    </div>
</div>
