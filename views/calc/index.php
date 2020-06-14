<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>
<div class="panel panel-default">
    <div class="panel-heading">Кредитный калькулятор</div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'id' => 'calc-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>

        <?= $form->field($model, 'date_start')->input('date', ['autofocus' => true]) ?>

        <?= $form->field($model, 'amount')->input('number', ['min' => 1000, 'value' => 1000]) ?>

        <?= $form->field($model, 'months_count')->input('number', ['min' => 1, 'max' => 36, 'value' => 3]) ?>

        <?= $form->field($model, 'percent')->input('number', ['min' => 0.1, 'max' => 1000, 'step' => '0.1', 'value' => 12]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Расчитать', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
