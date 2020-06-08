<?php


class KutyaFajtak {

    private $id;
    private $nev;
    private $eNev;
    function __construct($id, $nev, $eNev) {
        $this->id = $id;
        $this->nev = $nev;
        $this->eNev = $eNev;
    }
    function getId() {
        return $this->id;
    }

    function getNev() {
        return $this->nev;
    }

    function getENev() {
        return $this->eNev;
    }
    function setId($id): void {
        $this->id = $id;
    }

    function setNev($nev): void {
        $this->nev = $nev;
    }

    function setENev($eNev): void {
        $this->eNev = $eNev;
    }



}
