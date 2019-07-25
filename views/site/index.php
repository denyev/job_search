<?php
use yii\helpers\Url;
use yii\bootstrap4\LinkPager;
use rmrevin\yii\fontawesome\FAS;

/* @var $this yii\web\View */
/* @var $vacancy app\controllers\SiteController */

$this->title = 'Каталог вакансий';
?>
<div class="container catalog">
    <div class="card card-body bg-light mb-3 d-none d-sm-flex catalog__contrlos">
        <div class="btn-group btn-group-lg" role="group">
            <button class="btn btn-outline-primary catalog__btn" id="list"
                aria-label="Отображать списком">
                <?= FAS::icon('th-list')->size(FAS::SIZE_2X) ?>
            </button>
            <button class="btn btn-outline-primary catalog__btn" id="grid"
                aria-label="Отображать сеткой">
                <?= FAS::icon('th')->size(FAS::SIZE_2X) ?>
            </button>
        </div>
    </div>
    <div id="catalogList" class="row">

        <?php foreach($vacancies as $vacancyKey => $vacancy):?>
        <div class="catalog__item catalog__item--grid-view col-sm-6 mb-3">
            <div class="card catalog__card">
                <div class="card-body catalog__card-body">
                    <a class="card-header" href="<?= Url::toRoute(['site/view', 'id' => $vacancy->id]); ?>">
                        <h2 class="card-title">
                                <?= $vacancy->title ?>
                        </h2>
                    </a>

                    <div class="catalog__content">
                        <div class="catalog__description"
                                data-toggle="collapse"
                                data-target="#description-<?= $vacancyKey ?>"
                                aria-expanded="false"
                                aria-controls="description-<?= $vacancyKey ?>"
                        ></div>
                        <div class="card-text collapse multi-collapse catalog__text"
                             id="description-<?= $vacancyKey ?>">
                            <?= $vacancy->description ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
    <?php
        echo LinkPager::widget([
            'pagination' => $pagination,
            'maxButtonCount' => 2,
            'pageCssClass' => 'page-item',
            'linkOptions' => ['class' => ['page-link']],
            'options' => [
                    'class' => [
                            'pagination',
                            'justify-content-center',
                    ]
            ],
        ]);
    ?>
</div>
