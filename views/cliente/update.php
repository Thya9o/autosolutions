<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Alterar Cliente: ' . $model->id_cliente;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cliente, 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Alterar';
?>
<div class="cliente-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
            'model' => $model,
        ]);
    ?>
</div>
