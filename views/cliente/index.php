<?php
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
	<div class="panel-body">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <p>
            <?= Html::a('Novo Cliente', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
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