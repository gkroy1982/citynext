<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        // Put front-end settings there
        // (for example, url rules).
		'name'=>'Welcome to ',
		'theme'=>'front',
		'modules'=>array(
			// uncomment the following to enable the Gii tool
			
			'gii'=>array(
				'class'=>'system.gii.GiiModule',
				'password'=>'admin',
				// If removed, Gii defaults to localhost only. Edit carefully to taste.
				'ipFilters'=>array('192.168.0.101','127.0.0.1','::1'),
			),
			/**/
		),
		'components'=>array(
			'urlManager'=>array(
			'urlFormat'=>'path',
			'caseSensitive'=>false,
			'rules'=>array(
			'site/location/<id:\d+>/<title:.*?>',
			'site/location/',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		),
    )
);