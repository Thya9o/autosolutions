<?php
use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = 'Veiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary panel-box">
	<div class="panel-body">
        <p>
            <?= Html::a('<i class="fa fa-plus"></i>&nbsp; Veículo', ['cadastrar'], [
                    'class' => 'btn btn-emerald btn-flat',
                    'title' => 'Cadastrar Novo Veiculo',
                    'data-toggle' => 'tooltip',
                ]);
            ?>
        </p>
        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'id_veiculo',
                    'placa',
                    'marca',
                    'modelo',
                    'ano',
                    'cor',
                    'detalhes',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update}{delete}', 
                    ],
                ],
            ]);
        ?>
	</div>
</div>