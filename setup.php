<?php
require_once 'config.inc.php';

// Das SchemaTool ist für die Verwaltung des Datenbank-Schemas verantwortlich.
$schemaTool = new \Doctrine\ORM\Tools\SchemaTool($em);

// Die Metadata sind die Informationen über die Datenbank-Struktur, die in den
// Modellen als Annotationen hinterlegt sind.
$metadata = $em->getMetadataFactory()->getAllMetadata();

// updateSchema() passt die Struktur der Datenbank an das aktuelle Schema an, das
// in den Metadata hinterlegt ist.
$schemaTool->updateSchema($metadata);
