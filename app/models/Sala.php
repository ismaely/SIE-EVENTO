<?php


class Sala {
    private $idSala;
    private $numero;
    private $capacidade;
    
    function getIdSala() {
        return $this->idSala;
    }

    function getNumero() {
        return $this->numero;
    }

    function getCapacidade() {
        return $this->capacidade;
    }

    function setIdSala($idSala) {
        $this->idSala = $idSala;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setCapacidade($capacidade) {
        $this->capacidade = $capacidade;
    }



}
