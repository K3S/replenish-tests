<?php

use Interop\Container\ContainerInterface;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\Adapter\AdapterServiceFactory;
use ToolkitApi\Toolkit;

return [
    'factories' => [
        Toolkit::class => function (\Psr\Container\ContainerInterface $container) {

            $toolkitConfig = require __DIR__ . '/toolkit.php';

            /** @var \PDO $resource */
            $toolkit = new Toolkit(
                $container->get($toolkitConfig['databaseAdapterService'])->getDriver()->getConnection()->getResource(),
                null,
                null,
                'pdo'
            );

            $toolkit->setOptions($toolkitConfig['system']);
            //$toolkit->setOptions(array('customControl'=>'*debug'));

            return $toolkit;
        },
        Adapter::class => AdapterServiceFactory::class,
        'config' => function (ContainerInterface $container)
        {
            $localConfig = require __DIR__ . '/local.php';
            $config = \Laminas\Stdlib\ArrayUtils::merge($localConfig,                 [
                'db' => [
                    'driver' => 'Pdo',
                    'platform' => 'IbmDb2',
                    'platform_options' => [
                        'quote_identifiers' => true,
                    ],
                    'driver_options' => [
                        PDO::ATTR_PERSISTENT => true,
                        PDO::ATTR_EMULATE_PREPARES => true,
                    ],
                ],
                'k3s_settings' => require __DIR__ . '/k3s_settings.php',
            ]);

            return $config;
        }
    ],
];