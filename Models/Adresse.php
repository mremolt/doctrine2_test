<?php
namespace Models;

/**
 * @Entity
 * @Table(name="adressen")
 */
class Adresse
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /** @Column(type="string", length=150) */
    private $strasse;
    /** @Column(type="string", length=10) */
    private $hausnummer;
    /** @Column(type="string", length=10) */
    private $plz;
    /** @Column(type="string", length=100) */
    private $ort;

    /** @ManyToOne(targetEntity="Person", inversedBy="adressen") */
    private $person;


    public function getId() {
        return $this->id;
    }

    public function getStrasse() {
        return $this->strasse;
    }

    public function setStrasse($strasse) {
        $this->strasse = $strasse;
        return $this;
    }

    public function getHausnummer() {
        return $this->hausnummer;
    }

    public function setHausnummer($hausnummer) {
        $this->hausnummer = $hausnummer;
        return $this;
    }

    public function getPlz() {
        return $this->plz;
    }

    public function setPlz($plz) {
        $this->plz = $plz;
        return $this;
    }

    public function getOrt() {
        return $this->ort;
    }

    public function setOrt($ort) {
        $this->ort = $ort;
        return $this;
    }

    public function getPerson() {
        return $this->person;
    }

    public function setPerson(Person $person) {
        $person->addAdresse($this);
        $this->person = $person;
        return $this;
    }

    public function __toString() {
        return $this->getStrasse() . ' '
                . $this->getHausnummer() . ', '
                . $this->getPlz() . ' '
                . $this->getOrt();
    }
}