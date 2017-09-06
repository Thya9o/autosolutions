<?php
use yii\helpers\Html;

$this->title = 'Cadastrar Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
            'model' => $model,
        ]);
    ?>
</div>