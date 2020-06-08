<?php

class Kutyak {
    private $kutyaId;
    private $fajta_id;
    private $nev_id;
    private $eletkor;
    private $ut_ell;
    function __construct($kutyaId, $fajta_id, $nev_id, $eletkor, $ut_ell) {
        $this->kutyaId = $kutyaId;
        $this->fajta_id = $fajta_id;
        $this->nev_id = $nev_id;
        $this->eletkor = $eletkor;
        $this->ut_ell = $ut_ell;
    }
    function getKutyaId() {
        return $this->kutyaId;
    }

    function getFajta_id() {
        return $this->fajta_id;
    }

    function getNev_id() {
        return $this->nev_id;
    }

    function getEletkor() {
        return $this->eletkor;
    }

    function getUt_ell() {
        return $this->ut_ell;
    }

    function setKutyaId($kutyaId): void {
        $this->kutyaId = $kutyaId;
    }

    function setFajta_id($fajta_id): void {
        $this->fajta_id = $fajta_id;
    }

    function setNev_id($nev_id): void {
        $this->nev_id = $nev_id;
    }

    function setEletkor($eletkor): void {
        $this->eletkor = $eletkor;
    }

    function setUt_ell($ut_ell): void {
        $this->ut_ell = $ut_ell;
    }


}
