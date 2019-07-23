<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Job catalog';
?>
<div class="site-index">
    <div class="container">
        <?php foreach($vacancies as $vacancy):?>
            <div class="row">
                <a href="<?= Url::toRoute(['site/view', 'id' => $vacancy->id]); ?>">
                    <img src="<?= $vacancy->getImage(); ?>"
                         width="800" height="400"
                         alt="Изображение для вакансии «<?= $vacancy->title ?>»">
                </a>
                <a href="<?= Url::toRoute(['site/view', 'id' => $vacancy->id]); ?>">
                    <?= $vacancy->title ?>
                </a>
                <div>
                    <?= strip_tags(substr($vacancy->description, 0, 255)) ?>
                    <a href="<?= Url::toRoute(['site/view', 'id' => $vacancy->id]); ?>"> Далее...</a>
                </div>
            </div>
         <?php endforeach; ?>
        <?php
            echo LinkPager::widget([
                'pagination' => $pagination,
            ]);
        ?>
    </div>
</div>
