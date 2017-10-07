<?php
$this->title = 'Alterar Veiculo: ' . $model->id_veiculo;
$this->params['breadcrumbs'][] = ['label' => 'Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_veiculo, 'url' => ['view', 'id' => $model->id_veiculo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="veiculo-update">
    <?= $this->render('_form', [
            'model' => $model,
        ]);
    ?>
</div>
