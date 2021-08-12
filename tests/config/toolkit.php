<?php
return [
    'system' => [
//        'plug' => 'iPLUGR512K',
//        'plugSize' => '512K',
//        'plugPrefix' => 'iPLUGR',
        'XMLServiceLib' => 'QXMLSERV',
        'HelperLib' => 'QXMLSERV',
        'v5r4' => false,
        'sbmjobParams' => '',
        'debug' => true,
        'debugLogFile' => '/home/chuk/toolkit-debug.log',
        'ccsidBefore' => '',
        'ccsidAfter' => '',
        'useHex' => '',
        'paseCcsid' => '',
        'trace' => false,
        'sbmjobCommand' => '',
        'prestart' => false,
        'stateless' => true,
        'performance' => false,
        'idleTimeout' =>  '',
        'cdata' => true,
        'internalKey' => '/tmp/Toolkit',
        'encoding' => 'ISO-8859-1',
        'schemaSep' => '.',
        'parseOnly' => false,
        'parseDebugLevel' => false,
        'license' => false,
        'transport' => false,
        'dataStructureIntegrity' => '1',
        'arrayIntegrity' => '1',
        'customControl' => '*java',
        'transportType' => 'pdo',
        'httpTransportUrl' => '',
        'timeReport' => false,
    ],

    /**
     * Database Adapter Service
     *
     * If using db2 transport, specify the name of the database adapter service
     * (registered in the service manager)
     */
    'databaseAdapterService' => \Laminas\Db\Adapter\Adapter::class,
];