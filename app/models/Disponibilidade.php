<?php


class Disponibilidade {
      
       private $id_Evento;
       private $idUser;
       private $dataEscolhida;
       private $hora_Inicio;
       private $hora_fim;
       
      
       function getId_Evento() {
           return $this->id_Evento;
       }

       function getIdUser() {
           return $this->idUser;
       }

       function getDataEscolhida() {
           return $this->dataEscolhida;
       }

       function getHora_Inicio() {
           return $this->hora_Inicio;
       }

       function getHora_fim() {
           return $this->hora_fim;
       }

       function setId_Evento($id_Evento) {
           $this->id_Evento = $id_Evento;
       }

       function setIdUser($idUser) {
           $this->idUser = $idUser;
       }

       function setDataEscolhida($dataEscolhida) {
           $this->dataEscolhida = $dataEscolhida;
       }

       function setHora_Inicio($hora_Inicio) {
           $this->hora_Inicio = $hora_Inicio;
       }

       function setHora_fim($hora_fim) {
           $this->hora_fim = $hora_fim;
       }


   
       
}
