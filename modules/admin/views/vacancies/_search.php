<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\VacanciesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancies-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'title', [
            'labelOptions' => [
                    'class' => 'bmd-label-floating'
            ]
        ])
    ?>

    <fieldset class="form-group">
        <legend class="col-form-label text-muted">Дата</legend>
        <div class="row">
            <?= $form->field($model, 'min_date', [
                    'options' => [
                            'class' => 'col-6'
                    ],
                    'labelOptions' => [
                            'class' => 'bmd-label-floating'
                    ]
                ])
                ->widget(DatePicker::className(), [
                    'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'гггг-мм-дд'
                    ],
                ])
                ->label('От')
            ?>

            <?= $form->field($model, 'max_date', [
                    'options' => [
                            'class' => 'col-6'
                    ],
                    'labelOptions' => [
                            'class' => 'bmd-label-floating'
                    ]
                ])
                ->widget(DatePicker::className(), [
                    'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'гггг-мм-дд'
                    ],
                ])
                ->label('До')
            ?>
        </div>
    </fieldset>

    <?= $form->field($model, 'city', [
            'labelOptions' => [
                'class' => 'bmd-label-floating'
            ]
        ])
    ?>

    <?= $form->field($model, 'company', [
            'labelOptions' => [
                    'class' => 'bmd-label-floating'
            ]
        ])
    ?>

    <fieldset class="form-group">
        <legend class="col-form-label text-muted">Зарплата</legend>
        <div class="row">
            <?= $form->field($model, 'min_salary', [
                    'options' => [
                            'class' => 'col-6'
                    ],
                    'labelOptions' => [
                            'class' => 'bmd-label-floating'
                    ]
                ])
                ->label('От')
            ?>

            <?= $form->field($model, 'max_salary', [
                    'options' => [
                            'class' => 'col-6'
                    ],
                    'labelOptions' => [
                        'class' => 'bmd-label-floating'
                    ]
                ])
                ->label('До')
            ?>
        </div>
    </fieldset>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'response_id') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Поиск'), ['class' => 'btn btn-outline-primary']) ?>
        <?= Html::a(Yii::t('app', 'Сброс'), ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
