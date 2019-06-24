<?php


class Inscricao {
    private $idInscricao;
    private $dataInscricao;
    private $id_User;
    private $id_Evento;
    
    
    
    function getHora() {
        return $this->hora;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function getIdInscricao() {
        return $this->idInscricao;
    }

    function getDataInscricao() {
        return $this->dataInscricao;
    }

    function setIdInscricao($idInscricao) {
        $this->idInscricao = $idInscricao;
    }

    function setDataInscricao($dataInscricao) {
        $this->dataInscricao = $dataInscricao;
    }
    function getId_User() {
        return $this->id_User;
    }

    function getId_Evento() {
        return $this->id_Evento;
    }

    function setId_User($id_User) {
        $this->id_User = $id_User;
    }

    function setId_Evento($id_Evento) {
        $this->id_Evento = $id_Evento;
    }




}
