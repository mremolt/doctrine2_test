<?php
namespace Models;

/**
 * @Entity
 * @Table(name="personen")
 */
class Person
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /** @Column(type="string") */
    private $vorname;
    /** @Column(type="string") */
    private $nachname;
    /** @Column(type="date", nullable=true) */
    private $geburtstag;
    /** @Column(type="decimal", nullable=true) */
    private $gewicht;

    public function getId() {
        return $this->id;
    }

    public function getVorname() {
        return $this->vorname;
    }

    public function setVorname($vorname) {
        $this->vorname = $vorname;
        return $this;
    }

    public function getNachname() {
        return $this->nachname;
    }

    public function setNachname($nachname) {
        $this->nachname = $nachname;
        return $this;
    }

    public function getGeburtstag() {
        return $this->geburtstag;
    }

    public function setGeburtstag(\DateTime $geburtstag) {
        $this->geburtstag = $geburtstag;
        return $this;
    }

    public function getGewicht() {
        return $this->gewicht;
    }

    public function setGewicht($gewicht) {
        $this->gewicht = $gewicht;
        return $this;
    }

    public function __toString() {
        return $this->getVorname() . ' ' . $this->getNachname()
                . ' (' . $this->getId() . ')';
    }

}