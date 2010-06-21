<?php
require_once 'config.inc.php';

use Models\Person, Models\Adresse;

$p1 = new Person();
$p1->setVorname('Arthur')
    ->setNachName('Dent')
    ->setGeburtstag(new DateTime('1968-08-25'))
    ->setGewicht(83);

$em->persist($p1);

$a1 = new Adresse();
$a1->setStrasse('Nordostpark')
    ->setHausnummer('7')
    ->setPlz('D-90411')
    ->setOrt('Nürnberg')
    ->setPerson($p1);

$em->persist($a1);

$em->flush();


$adressen = $p1->getAdressen();
echo $p1;
echo $adressen[0];
