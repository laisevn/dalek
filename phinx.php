<?php

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/src/Infra/Db/MySQL/Config/Migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/src/Infra/Db/MySQL/Config/Seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'development' => [
            'adapter' => 'mysql',
            'host' =>  '127.0.0.1',
            'name' => 'payment_api',
            'user' => 'root',
            'pass' => '',   
            'port' => '3307',
            'charset' => 'utf8',
        ],
    ],
    'version_order' => 'creation'
];
