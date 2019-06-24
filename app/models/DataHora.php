<?php


class DataHora {
    
    private $dataEtipulada1;
    private $dataEtipulada2;
    private $horaInicio1;
    private $horaFim1;
    private $horaInicio2;
    private $horaFim2;
    private $id_Evento;
    
    function getDataEtipulada1() {
        return $this->dataEtipulada1;
    }

    function getDataEtipulada2() {
        return $this->dataEtipulada2;
    }

    function getHoraInicio1() {
        return $this->horaInicio1;
    }

    function getHoraFim1() {
        return $this->horaFim1;
    }

    function getHoraInicio2() {
        return $this->horaInicio2;
    }

    function getHoraFim2() {
        return $this->horaFim2;
    }

    function getId_Evento() {
        return $this->id_Evento;
    }

    function setDataEtipulada1($dataEtipulada1) {
        $this->dataEtipulada1 = $dataEtipulada1;
    }

    function setDataEtipulada2($dataEtipulada2) {
        $this->dataEtipulada2 = $dataEtipulada2;
    }

    function setHoraInicio1($horaInicio1) {
        $this->horaInicio1 = $horaInicio1;
    }

    function setHoraFim1($horaFim1) {
        $this->horaFim1 = $horaFim1;
    }

    function setHoraInicio2($horaInicio2) {
        $this->horaInicio2 = $horaInicio2;
    }

    function setHoraFim2($horaFim2) {
        $this->horaFim2 = $horaFim2;
    }

    function setId_Evento($id_Evento) {
        $this->id_Evento = $id_Evento;
    }


    
}
