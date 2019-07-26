<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\LinkPager;
use rmrevin\yii\fontawesome\FAS;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $vacancy app\controllers\SiteController */
/* @var $searchModel app\controllers\SiteController */
/* @var $dataProvider app\controllers\SiteController */

$this->title = 'Каталог вакансий';
?>
<?php Pjax::begin(); ?>
<div class="row mt-5">
    <div class="col-12 col-md-3">
        <?= $this->render('@app/modules/admin/views/vacancies/_search', [
                'model' => $searchModel
            ]);
        ?>
    </div>
    <div class="catalog col-12 col-md-9">
        <div class="card card-body bg-light mb-3 d-none d-sm-flex catalog__contrlos">
            <div class="btn-group btn-group-lg" role="group">
                <button class="btn btn-outline-primary catalog__btn" id="list" type="button"
                    aria-label="Отображать списком">
                    <?= FAS::icon('th-list')->size(FAS::SIZE_2X) ?>
                </button>
                <button class="btn btn-outline-primary catalog__btn" id="grid" type="button"
                    aria-label="Отображать сеткой">
                    <?= FAS::icon('th')->size(FAS::SIZE_2X) ?>
                </button>
            </div>
        </div>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => "{items}\n{pager}",
            'options' => [
                'tag' => 'div',
                'class' => 'row',
                'id' => 'catalogList',
            ],
            'itemOptions' => [
                    'class' => [
                        'catalog__item',
                        'catalog__item--grid-view',
                        'col-sm-6',
                        'mb-3',
                    ]
            ],
            'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('/partials/_catalog-item',['model' => $model]);
            },
            'pager' => [
                'maxButtonCount' => 3,
                'pageCssClass' => [
                        'catalog__pagination-item',
                        'page-item',
                ],
                'linkOptions' => ['class' => ['page-link']],
                'options' => [
                    'class' => [
                        'catalog__pagination',
                        'pagination',
                        'justify-content-center',
                        'col-12',
                    ]
                ],
            ]
        ]) ?>
    </div>
</div>
<?php Pjax::end(); ?>
