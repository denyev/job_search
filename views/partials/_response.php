<?php
use yii\helpers\Html;

/* @var $vacancy app\controllers\SiteController */
/* @var $responses app\controllers\SiteController */
/* @var $responseForm app\controllers\SiteController */
?>
<?php if(!empty($responses)):?>
<section>
    <h2>Отклики</h2>
    <div class="row mt-3 mb-3">
        <?php foreach($responses as $response):?>
            <div class="col-sm-6 col-md-3">
            <div class="card mb-3">
                <dl class="card-body row">
                    <dt class="card-title col-6">Имя:</dt>
                    <dd class="card-text col-6">
                        <?= Html::encode($response->name); ?>
                    </dd>
                    <dt class="card-title col-6">Телефон:</dt>
                    <dd class="card-text col-6">
                        <?= Html::encode($response->phone); ?>
                    </dd>
                    <dt class="card-title col-6">Зарплата:</dt>
                    <dd class="card-text col-6">
                        <?= Html::encode($response->salary); ?>
                    </dd>
                </dl>
            </div>
            </div>
        <?php endforeach;?>
    </div>
</section>
<?php endif;?>

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
        <?php
            echo $form->field($responseForm, 'name')
                ->textInput([
                    'class' => 'form-control',
                    'placeholder' => 'Иванов Иван'
                ])
                ->label('Имя');

            echo $form->field($responseForm, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                    'options' => [
                        'class' => 'form-control',
                        'id' => 'responsePhone',
                        'placeholder' => '+7 (___) ___-__-__'
                    ],
                    'clientOptions' => [
                        'clearIncomplete' => true
                    ],
                    'mask' => '+7 (999) 999-99-99',
                ])
                ->label('Телефон');

            echo $form->field($responseForm, 'salary')
                ->textInput([
                    'class' => 'form-control',
                    'placeholder' => ''
                ])
                ->label('Зарплата');
        ?>
    </div>
    <button type="submit" class="btn btn-outline-primary">Отклик</button>
    <?php \yii\widgets\ActiveForm::end();?>
</section>
