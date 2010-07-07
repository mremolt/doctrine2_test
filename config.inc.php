<?php
// Fehlermeldungen einschalten, nur zur Sicherheit ;-)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Importiere die zentralen Doctrine-Klassen in den globalen Namespace
use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ApcCache,
    Entities\User, Entities\Address;

// Die Autoloader-Klasse von Doctrine laden
require 'lib/Doctrine/Common/ClassLoader.php';

// Autoloading für Doctrine
$doctrineClassLoader = new ClassLoader('Doctrine', realpath(__DIR__ . '/lib'));
$doctrineClassLoader->register();
// Autoloading für unsere Modelle
$entitiesClassLoader = new ClassLoader('Models', __DIR__);
$entitiesClassLoader->register();
// Autoloading für die Doctrine-Proxy-Klassen
$proxiesClassLoader = new ClassLoader('Proxies', __DIR__);
$proxiesClassLoader->register();

// Beginne mit der Konfiguration
$config = new Configuration();
// Wir verwenden die neue Annotations-Syntax für die Modelle (Alternativen: yaml und xml-Dateien)
$driverImpl = $config->newDefaultAnnotationDriver(array(__DIR__ . "/Models"));
$config->setMetadataDriverImpl($driverImpl);

// Teile Doctrine mit, wo es die Proxy-Klassen ablegen soll
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');


// Wenn in PHP die Erweiterung APC (http://php.net/manual/de/book.apc.php)
// installiert ist, kann der Doctrine-Cache sie verwenden.
// Doctrine nutzt Caching sehr agressiv, wenn möglich also einschalten!
/*
$cache = new \Doctrine\Common\Cache\ApcCache();
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);
 */

// Die eigentliche Datenbankverbindung wird in Form eines Arrays angelegt,
// wobei die Schlüssel wie beim Erzeugen einer PDO-Instanz heißen. Das Array
// entspricht also:
// new PDO('mysql:dbname=doctrine2_test;host=localhost', 'root', '');
$connectionOptions = array(
    'driver'   => 'pdo_mysql',
    'dbname'   => 'doctrine2_test',
    'host'     => 'localhost',
    'user'     => 'root',
    'password' => '',
);

// Instanz von Doctrine\ORM\EntityManager, dem zentralen Objekt des ORM von Doctrine.
// Über dieses Objekt werden alle Datenbank-Operationen abgewickelt.
$em = EntityManager::create($connectionOptions, $config);