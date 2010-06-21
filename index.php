<?php
require_once 'config.inc.php';

use Models\Person;

$p1 = new Person();

$p1->setVorname('Arthur')
    ->setNachName('Dent')
    ->setGeburtstag(new DateTime('1968-08-25'))
    ->setGewicht(83);

$em->persist($p1);
$em->flush();

echo $p1;
