<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\BootstrapAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VacanciesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

BootstrapAsset::register($this);

$this->title = Yii::t('app', 'Вакансии');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancies-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Создать вакансию'), ['create'], [
            'class' => 'btn btn-outline-success'
        ]) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'date',
            'city',
            'company',
            'salary',
            //'description:ntext',
            //'response_id',
            //'category_id',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
