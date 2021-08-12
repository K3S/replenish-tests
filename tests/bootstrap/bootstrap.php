<?php
declare(strict_types=1);

namespace ApplicationIntegrationTest;

use Interop\Container\ContainerInterface;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\ServiceManager\ServiceManager;

require_once __DIR__ . '/../../vendor/autoload.php';

final class Bootstrap
{
    /**
     * @var ContainerInterface|ServiceManager
     */
    private static $container;

    public static function init()
    {
        $containerConfig = require __DIR__ . '/../config/container.php';
        self::$container = new ServiceManager($containerConfig);
    }

    /**
     * @return ContainerInterface
     */
    public static function getContainer(): ContainerInterface
    {
        return self::$container;
    }

    public static function executeSql(string $sql, array $params = [])
    {
        /** @var Adapter $adapter */
        $adapter = self::$container->get(Adapter::class);
        $adapter->query($sql)->execute();
    }

    /**
     * @param string[] $array
     */
    public static function executeSqlArray(array $array)
    {
        foreach ($array as $sql) {
            self::executeSql($sql);
        }
    }

    /**
     * @param string $sql
     * @return mixed
     */
    public static function executeSqlWithOneResult(string $sql)
    {
        /** @var Adapter $adapter */
        $adapter = self::$container->get(Adapter::class);

        return $adapter->query($sql)->execute()->current();
    }
}

Bootstrap::init();