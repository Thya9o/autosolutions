<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "veiculo".
 *
 * @property integer $id_veiculo
 * @property string $placa
 * @property string $marca
 * @property string $modelo
 * @property string $ano
 * @property string $cor
 * @property string $detalhes
 *
 * @property ClienteVeiculo[] $clienteVeiculos
 * @property Cliente[] $idClientes
 */
class Veiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'veiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['placa'], 'required'],
            [['ano'], 'safe'],
            [['placa'], 'string', 'max' => 7],
            [['marca', 'modelo', 'cor'], 'string', 'max' => 100],
            [['detalhes'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_veiculo' => 'Id Veiculo',
            'placa' => 'Placa',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'ano' => 'Ano',
            'cor' => 'Cor',
            'detalhes' => 'Detalhes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteVeiculos()
    {
        return $this->hasMany(ClienteVeiculo::className(), ['id_veiculo' => 'id_veiculo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClientes()
    {
        return $this->hasMany(Cliente::className(), ['id_cliente' => 'id_cliente'])->viaTable('cliente_veiculo', ['id_veiculo' => 'id_veiculo']);
    }
}
