<?php


class Administrador extends Utilizador {
   
    private $id_admin;
    
    function getId_admin() {
        return $this->id_admin;
    }

    function setId_admin($id_admin) {
        $this->id_admin = $id_admin;
    }


    
    
}
