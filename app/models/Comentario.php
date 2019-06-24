<?php


class Comentario {
    private $idComentario;
    private $data;
    private $hora;
    private $mensagem;
    private $idEvento;
    private $id_idUser;
    
    
    function getIdComentario() {
        return $this->idComentario;
    }

    function getData() {
        return $this->data;
    }

    function getHora() {
        return $this->hora;
    }

    function getMensagem() {
        return $this->mensagem;
    }

    function getIdEvento() {
        return $this->idEvento;
    }

    function getId_idUser() {
        return $this->id_idUser;
    }

    function setIdComentario($idComentario) {
        $this->idComentario = $idComentario;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    function setIdEvento($idEvento) {
        $this->idEvento = $idEvento;
    }

    function setId_idUser($id_idUser) {
        $this->id_idUser = $id_idUser;
    }



}
