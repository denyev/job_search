<?php
use yii\helpers\Html;
use yii\helpers\Url;

$formatter = \Yii::$app->formatter;
?>
<article class="card catalog__card">
    <div class="card-header">
        <h2 class="card-title">
            <?= Html::a(Html::encode($model->title),
                Url::toRoute(['site/view', 'id' => $model->id]), ['title' => $model->title]) ?>
        </h2>
        <?php if ($model->salary): ?>
        <b class="card-subtitle text-muted catalog__subtitle">
            <?= $formatter->asCurrency(
                    $model->salary,
                    $currency = null,
                    $options = [
                            NumberFormatter::MIN_FRACTION_DIGITS => 0,
                    ])
            ?>
        </b>
        <?php endif; ?>
    </div>
    <div class="card-body catalog__card-body">

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
    </div>
    <div class="card-footer text-muted">
        <div class="catalog__meta row justify-content-between px-4">
            <p class="catalog__meta-item"><?= $formatter ->asDate($model->date) ?></p>
            <p class="catalog__meta-item"><?= $model->city ?></p>
            <p class="catalog__meta-item"><?= $model->company ?></p>
        </div>
    </div>
</article>
