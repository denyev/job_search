<?php
use yii\helpers\Html;

/* @var $vacancy app\controllers\SiteController */
/* @var $responses app\controllers\SiteController */
/* @var $responseForm app\controllers\SiteController */

$formatter = \Yii::$app->formatter;
?>
<?php if(!empty($responses)):?>
<section>
    <h2>Отклики</h2>
    <div class="row mt-3 mb-3">
        <?php foreach($responses as $response):?>
            <div class="col-lg-6 col-xl-4">
            <div class="card mb-3">
                <dl class="card-body row">
                    <dt class="card-title col-6">Имя:</dt>
                    <dd class="card-text col-6">
                        <?= Html::encode($response->name); ?>
                    </dd>
                    <dt class="card-title col-6">Телефон:</dt>
                    <dd class="card-text col-6">
                        <a href="tel:+7<?= Html::encode($response->phone); ?>"
                           aria-label="Телефон соискателя: <?= Html::encode($response->name); ?>">
                            <?= $formatter->asPhone($response->phone) ?>
                        </a>
                    </dd>
                    <dt class="card-title col-6">Зарплата:</dt>
                    <dd class="card-text col-6">
                        <?= $formatter->asCurrency(
                                $response->salary,
                                $currency = null,
                                $options = [
                                    NumberFormatter::MIN_FRACTION_DIGITS => 0,
                                ]
                            )
                        ?>
                    </dd>
                </dl>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<section class="row">
    <h2>Оставить отклик</h2>
    <?php
        $form = \yii\widgets\ActiveForm::begin([
            'action' => [
                'site/response',
                'id' => $vacancy->id
            ],
            'options' => [
                'class' => [
                    'form-horizontal',
                    'contact-form',
                    'col-md-12',
                ],
                'role' => 'form'
            ]
        ]);
    ?>
    <div class="form-group">
        <?= $form->field($responseForm, 'name', [
                    'labelOptions' => [
                        'class' => 'bmd-label-floating'
                    ]
                ])
                ->textInput([
                    'class' => 'form-control',
                    'placeholder' => 'Иванов Иван'
                ])
                ->label('Имя');
        ?>

        <?= $form->field($responseForm, 'phone', [
                    'labelOptions' => [
                        'class' => 'bmd-label-floating'
                    ]
                ])
                ->widget(\yii\widgets\MaskedInput::className(), [
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => '+7 (___) ___-__-__'
                    ],
                    'clientOptions' => [
                        'clearIncomplete' => true,
                        'removeMaskOnSubmit' => true,
                    ],
                    'mask' => '+7 (999) 999-99-99',
                ])
                ->label('Телефон');
        ?>

        <?= $form->field($responseForm, 'salary', [
                    'labelOptions' => [
                        'class' => 'bmd-label-floating'
                    ]
                ])
                ->textInput([
                    'class' => 'form-control',
                ])
                ->label('Зарплата');
        ?>
    </div>
    <button type="submit" class="btn btn-outline-primary">Отклик</button>
    <?php \yii\widgets\ActiveForm::end();?>
</section>
