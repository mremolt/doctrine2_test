<?php
require_once 'config.inc.php';

use Models\Person, Models\Adresse;

$p1 = new Person();
// Für die Setter habe ich in den Klassen ein Fluent-Interface implementiert.
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

// hole die Person mit id 1 per finder-Methode aus der Datenbank
$person1 = $em->find('Models\Person', 1);
echo $person1;

// hole die Person mit id 1 per DQL aus der Datenbank
$query = $em->createQuery("SELECT p, a FROM Models\Person p LEFT JOIN p.adressen a WHERE p.id = 1");
$query->useResultCache(true);
$personen2 = $query->execute();
$person2 = $personen2[0];

echo $person2;

// hole die Person mit id 1 per QueryBuilder aus der Datenbank
$query = $em->createQueryBuilder()
        ->select('p, a')->from('Models\Person', 'p')->where('p.id = 1')
        ->leftJoin('p.adressen', 'a')
        ->getQuery();

$query->useResultCache(true);
$personen3 = $query->execute();

$person3 = $personen3[0];
echo $person3;

$adressen = $person3->getAdressen();
echo $adressen[0];
