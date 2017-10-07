<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
	<div class="panel panel-primary panel-box">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">  
                    <?= $form->field($model, 'placa')->textInput(['maxlength' => true]) ?>
				</div>
				<div class="col-md-4">
            		<?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>
				</div>
				<div class="col-md-4">
             	    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>
           	    </div>
				<div class="col-md-4">
                    <?= $form->field($model, 'ano')->textInput() ?>
                </div>
                <div class="col-md-4">
                	<?= $form->field($model, 'cor')->textInput(['maxlength' => true]) ?>
                </div>
			</div>
            <div class="row">
                <div class="col-md-12">
	            	<?= $form->field($model, 'detalhes')->textInput(['maxlength' => true]) ?>
	            </div>         
            </div>
       	</div>
       	<div class="panel-footer">
    		<div class="row">
    			<div class="col-md-3">
                    <div class="form-group">
                        <?= Html::submitButton('<i class="fa fa-save"></i>&nbsp; '. ($model->isNewRecord ? 'Cadastrar' : 'Alterar'), [
                                'class' => $model->isNewRecord 
                                ? 'btn btn-emerald btn-flat btn-block' 
                                : 'btn btn-primary btn-flat btn-block'            
                            ]);
                        ?>
                    </div>
    			</div>
    			<div class="col-md-3 pull-right">
                    <div class="form-group">
                        <?= Html::a('<i class="fa fa-reply"></i>&nbsp; Voltar', ['/veiculo'], [
                                'class' => 'btn btn-flat btn-warning btn-block',
                            ]);
                        ?>
                    </div>
    			</div>
    		</div>
        </div>
	</div>
<?php ActiveForm::end(); ?>
