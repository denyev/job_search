<?php
use yii\helpers\Html;

/* @var $vacancy app\controllers\SiteController */
/* @var $responses app\controllers\SiteController */
/* @var $responseForm app\controllers\SiteController */
?>
<?php if(!empty($responses)):?>
    <?php foreach($responses as $response):?>
        <div>
            <div>
                <p>
                    <b>Имя:</b> <?= Html::encode($response->name); ?>
                </p>
                <p>
                    <b>Телефон:</b> <?= Html::encode($response->phone); ?>
                </p>
                <p>
                    <b>Зарплата:</b> <?= Html::encode($response->salary); ?>
                </p>
            </div>
        </div>
    <?php endforeach;?>
<?php endif;?>

<div>
    <?php
        $form = \yii\widgets\ActiveForm::begin([
            'action'=>[
                'site/response',
                'id'=>$vacancy->id
            ],
            'options'=>[
                'class'=>'form-horizontal contact-form',
                'role'=>'form'
            ]
        ]);
    ?>
    <div class="form-group">
        <div class="col-md-12">
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
    </div>
    <button type="submit" class="btn send-btn">Отклик</button>
    <?php \yii\widgets\ActiveForm::end();?>
</div>
