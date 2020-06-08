<?php


class KutyaNevek {

    private $id;
    private $kutyaNev;
    function __construct($id, $kutyaNev) {
        $this->id = $id;
        $this->kutyaNev = $kutyaNev;
    }
    
    function getId() {
        return $this->id;
    }

    function getKutyaNev() {
        return $this->kutyaNev;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setKutyaNev($kutyaNev): void {
        $this->kutyaNev = $kutyaNev;
    }



}
