<?php

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

    public function getId() {
        return $this->id;
    }

    public function getStrasse() {
        return $this->strasse;
    }

    public function setStrasse($strasse) {
        $this->strasse = $strasse;
    }

    public function getHausnummer() {
        return $this->hausnummer;
    }

    public function setHausnummer($hausnummer) {
        $this->hausnummer = $hausnummer;
    }

    public function getPlz() {
        return $this->plz;
    }

    public function setPlz($plz) {
        $this->plz = $plz;
    }

    public function getOrt() {
        return $this->ort;
    }

    public function setOrt($ort) {
        $this->ort = $ort;
    }
}