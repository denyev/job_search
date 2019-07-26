<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="card catalog__card">
    <article class="card-body catalog__card-body">
        <div class="card-header">
            <h2 class="card-title">
                <?= Html::a(Html::encode($model->title),
                        Url::toRoute(['site/view', 'id' => $model->id]), ['title' => $model->title]) ?>
            </h2>
        </div>

        <div class="catalog__content">
            <div class="catalog__description"
                 data-toggle="collapse"
                 data-target="#description-<?= $model->id ?>"
                 aria-expanded="false"
                 aria-controls="description-<?= $model->id ?>"
                 role="button"
                 aria-label="Развернуть"
            ></div>
            <div class="card-text collapse multi-collapse catalog__text"
                 id="description-<?= $model->id ?>">
                <?= $model->description ?>
            </div>
        </div>
    </article>
</div>
