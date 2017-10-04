<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente_veiculo".
 *
 * @property integer $id_cliente
 * @property integer $id_veiculo
 *
 * @property Cliente $idCliente
 * @property Veiculo $idVeiculo
 */
class ClienteVeiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente_veiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_veiculo'], 'required'],
            [['id_cliente', 'id_veiculo'], 'integer'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id_cliente']],
            [['id_veiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Veiculo::className(), 'targetAttribute' => ['id_veiculo' => 'id_veiculo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'id_veiculo' => 'Id Veiculo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(Cliente::className(), ['id_cliente' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVeiculo()
    {
        return $this->hasOne(Veiculo::className(), ['id_veiculo' => 'id_veiculo']);
    }
}
