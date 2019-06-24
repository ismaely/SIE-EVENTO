<?php


class Privilegio {

         private $idPrivilegio;
         private $idUser;
         private $grau;
         private $id_Evento;
         private $telefone;
         private $email;

         function getIdPrivilegio() {
             return $this->idPrivilegio;
         }

         function getIdUser() {
             return $this->idUser;
         }

         function getGrau() {
             return $this->grau;
         }

         function getId_Evento() {
             return $this->id_Evento;
         }

         function getTelefone() {
             return $this->telefone;
         }

         function getEmail() {
             return $this->email;
         }

         function setIdPrivilegio($idPrivilegio) {
             $this->idPrivilegio = $idPrivilegio;
         }

         function setIdUser($idUser) {
             $this->idUser = $idUser;
         }

         function setGrau($grau) {
             $this->grau = $grau;
         }

         function setId_Evento($id_Evento) {
             $this->id_Evento = $id_Evento;
         }

         function setTelefone($telefone) {
             $this->telefone = $telefone;
         }

         function setEmail($email) {
             $this->email = $email;
         }


        







}
