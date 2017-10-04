<?php
use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
	<div class="panel-body">
        <h1><?= Html::encode($this->title) ?></h1>
    
        <p>
            <?= Html::a('Novo Cliente', ['cadastrar'], ['class' => 'btn btn-success btn-flat']) ?>
        </p>
       <?= GridView::widget([
                'dataProvider'=> $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                   ['class' => 'yii\grid\SerialColumn'],
                   'id_cliente',
                   'nome',
                   'sobrenome',
                   'apelido',
                   'documento',
                   // 'sexo',
                   // 'data_nascimento',
                   // 'data_cadastro',
                   // 'cep',
                   // 'endereco',
                   // 'numero',
                   // 'complemento',
                   // 'bairro',
                   // 'id_cidade',
                   // 'id_estado',
                   // 'email:email',
                   // 'situacao',
                   // 'tipo',
                   
                   ['class' => 'yii\grid\ActionColumn'],
                ],
                'responsive'=>true,
                'hover'=>true
            ]);
       ?>
    </div>
</div>
