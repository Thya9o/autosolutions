<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Veiculo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="veiculo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'placa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ano')->textInput() ?>

    <?= $form->field($model, 'cor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detalhes')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
