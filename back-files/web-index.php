<?php
defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');

use yii\web\BadRequestHttpException;
use app\base\System;
use app\base\SystemError;

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

try {
    
    (new yii\web\Application($config));

    //Define o host para então determinar o cliente
    $host = '.gercpn.com.br'; //default
    
    //Verifica se há um arquivo de parametros local
    if (is_file($_SERVER['DOCUMENT_ROOT'] . '/../config/params.local.php')){
        $paramsLocal = require($_SERVER['DOCUMENT_ROOT'] . '/../config/params.local.php');
    
        if (!empty($paramsLocal['host'])){
            $host = $paramsLocal['host'];
        }
    }
   
    //Inicializa a parametrização de acordo com o cliente
    $system = new System(str_replace($host, '', $_SERVER['SERVER_NAME']));
        
    //Roda a aplicação
    Yii::$app->run();
    
}catch(yii\db\Exception $e) {
    
    //Salva log do erro, ver tabela log_error
    $log = new SystemError([
        'mensagem' => "web/index lançou um erro de conexão com banco de dados",
        'arquivo' => $e->getFile(),
        'arquivo_metodo' => 'web/index.php',
        'arquivo_linha' => 49,
        'tipo' => SystemError::TIPO_FATAL,
        'exception' => $e->getMessage(),
        'tratamento' => SystemError::TRATAMENTO_ERRO_NAO_TRATADO
    ]);
    $log->save();
    throw new BadRequestHttpException('<p>Erro ao se conectar com base de dados, contate administrador!</p><strong>Erro: </strong>'.$e->getMessage(), 500, $e->getPrevious());
}

