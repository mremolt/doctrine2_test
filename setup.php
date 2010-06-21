<?php
require_once 'config.inc.php';

$schemaTool = new \Doctrine\ORM\Tools\SchemaTool($em);
$metadata = $em->getMetadataFactory()->getAllMetadata();

$schemaTool->updateSchema($metadata);
