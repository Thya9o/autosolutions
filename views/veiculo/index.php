<?php
use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = 'Veiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
	<div class="panel-body">
	    <h1><?= Html::encode($this->title) ?></h1>
    
        <p>
            <?= Html::a('Cadastrar Veículo', ['cadastrar'], ['class' => 'btn btn-success btn-flat']) ?>
        </p>
        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
        
                    'id_veiculo',
                    'placa',
                    'marca',
                    'modelo',
                    'ano',
                    // 'cor',
                    // 'detalhes',
        
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
        ?>
	</div>
</div>