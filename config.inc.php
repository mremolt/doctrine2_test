<?php
use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ApcCache,
    Entities\User, Entities\Address;

require 'lib/Doctrine/Common/ClassLoader.php';

$doctrineClassLoader = new ClassLoader('Doctrine', realpath(__DIR__ . '/lib'));
$doctrineClassLoader->register();
$entitiesClassLoader = new ClassLoader('Models', __DIR__);
$entitiesClassLoader->register();
$proxiesClassLoader = new ClassLoader('Proxies', __DIR__);
$proxiesClassLoader->register();

$config = new Configuration();
$driverImpl = $config->newDefaultAnnotationDriver(array(__DIR__ . "/Models"));
$config->setMetadataDriverImpl($driverImpl);

$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');

$connectionOptions = array(
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost'
);

$em = EntityManager::create($connectionOptions, $config);