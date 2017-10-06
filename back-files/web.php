<?php

use kartik\mpdf\Pdf;


//Verifica se foi criado o arquivo com os parâmetros locais da aplicação

$config = [
    'id' => 'basic',
    'language' => 'pt-BR',
    'sourceLanguage' => 'pt-BR',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'name' => 'GERCPN',
    'components' => [
	    'i18n'=>[
	    	'translations'=>[
        		'kvgrid'=>[
                    'class' => 'yii\i18n\PhpMessageSource',
                    'forceTranslation' => true
                ]

		  ]
	    ],
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
		],
		'listcontrollers' => [
			// lista funciona com
			'class' => 'app\components\listcontrollers',
			'deny'=>['gii','gridview','debug','*'],
			'cache'=>1,

		],
		'usertool' => [
			'class' => 'app\components\usertool',
			'model'=>'app\modules\auth\models\AuthUser',
			'username'=>'username',

		],
        'menu' => [
            'class' => 'app\components\menurbac',
            'menucfg'=>dirname(__DIR__).'/config/menu.php',

        ],
		'request' => [
            //!!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'L5zNCQx0wXfQtfW5rjxZQ-PNMBzHIqUB', // TESTE
        ],
        'cache' => require(__DIR__ . '/cache.php'),
        'user' => [
            'identityClass' => 'app\modules\auth\models\AuthUser',
       		'enableAutoLogin' => true,
            
		],
		'session' => [
		    //'class' => 'yii\web\CacheSession', // TESTE
			//'name' => '_gercpn', // unique for backend // TESTE
			//'cache' => 'cache', // TESTE
		    //'cookieParams' => ['httponly' => true, 'lifetime' => 3600 * 4],//Retirado veja procedure create_events_derruba_session()
		    //'timeout' => 3600*4,
		    //'useCookies' => true,
		],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
       		'transport' => [
        			'class' => 'Swift_SmtpTransport',
        			'host' => 'smtp.gmail.com',
        			'username' => 'naoresponda@cpninformatica.com.br',
        			'password' => 'cpn#2010',
        			'port' => '465',
        			'encryption' => 'ssl',
        		],        		
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
		'urlManager' => [
		    'class' => 'yii\web\UrlManager',
		    'showScriptName' => false,
			'enablePrettyUrl' => true,
			'rules' => [
                '/' => '/site',
                '<controller:\w+>/<id:\d+>'             => '<controller>/view',
                '<controller:\w+>/<action>/<id:\d+>'    => '<controller>/<action>',
			    '<controller:[\w-]+>/<action>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'         => '<controller>/<action>',
				'<controller:[\w-]+>/update/<id:\d+>'   => '<controller>/update',
				'<controller:[\w-]+>/delete/<id:\d+>'   => '<controller>/delete',
    			'<controller:[\w-]+>/<id:\d+>'          => '<controller>/view',
			    '<controller:[\w-]+>/<id:\d+>'          => '<controller>/detail',
			    '<controller:[\w-]+>/<id:\d+>'          => '<controller>/download',
			    '<controller:[\w-]+>/<id:\d+>'          => '<controller>/processar',
			    'cliente'          => 'clientes',
			    'pedido-pagamento/incluir/<idPedido:\d+>/<idPagamento:\d+>' => 'pedido-pagamento/incluir',
				'faturas-receber/baixar-fatura/<id_fatura:\d+>/<nr_parcela:\d+>' => 'faturas-receber/baixar-fatura',
				'faturas-receber/estorno-fatura/<id_fatura:\d+>/<nr_parcela:\d+>' => 'faturas-receber/estorno-fatura',
			],
		],
   		'pdf' => [
			'class' => Pdf::classname(),
			'format' => Pdf::FORMAT_A4,
			'orientation' => Pdf::ORIENT_PORTRAIT,
			'destination' => Pdf::DEST_BROWSER,
		],    		
        'messages' => [
            'class' => 'CPhpMessageSource'
		],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'defaultTimeZone' => 'America/Sao_Paulo',
            'dateFormat' => 'd/m/Y',
            'datetimeFormat' => 'd/m/Y H:i:s',
            'thousandSeparator' => '.',
            'decimalSeparator' => ',',
            'currencyCode' => 'BRL',
        ],
        //NÃO ALTERAR ESSA LINHA PELAMORDEDEUS
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => empty(\Yii::$app->PA)? null : \Yii::$app->PA,
    'modules' => [
		'auth' => [
            'class' => 'app\modules\auth\auth',
		],
        'financeiro' => [
            'class' => 'app\modules\financeiro\Module',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            'downloadAction' => 'gridview/export/download',
            'i18n' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@kvgrid/messages',
                'forceTranslation' => true
            ],
        ],
    ],
    'container' => [ // configuracao default para o gridview
        'definitions' => [
            kartik\grid\GridView::class => [
                'containerOptions' => ['style' => 'overflow: auto'],
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => false,
                'bordered' => true,
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                'showPageSummary' => false,
                'toolbar' => [
                    '{toggleData}',
                ],
                'toggleDataOptions' => [
                    'all' => [
                        'icon' => 'resize-full',
                        'label' => false,
                        'class' => 'btn btn-default btn-flat',
                        'title' => 'Mostrar todos os resultados',
                        'data-toggle' => 'tooltip',
                    ],
                    'page' => [
                        'icon' => 'resize-small',
                        'label' => false,
                        'class' => 'btn btn-default btn-flat',
                        'title' => 'Mostar resultados com paginação',
                        'data-toggle' => 'tooltip',
                    ],
                ],
                'panel' => [
                    'type' => kartik\grid\GridView::TYPE_PRIMARY,
                ],
            ],
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
