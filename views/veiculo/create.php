<?php
$this->title = 'Cadastrar Novo Veiculo';
$this->params['breadcrumbs'][] = ['label' => 'Veiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veiculo-create">
    <?= $this->render('_form', [
            'model' => $model,
        ]);
    ?>
</div>
