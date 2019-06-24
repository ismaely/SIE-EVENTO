<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdministradorDao
 *
 * @author ismael_7il
 */
class AdministradorDao extends BasePadraoSql{
    
     public function registarAdmin(Administrador $dad) {

        try {
            
            parent::setTabela('administrador');
            parent::setCampos('idUser');
            parent::setDados(':idUser');
            $inserir = parent::inserir();
            $inserir->bindParam(':idUser', $dad->getId_admin(), PDO::PARAM_INT);
            $retorno =   $inserir->execute();
              if ($retorno) :
                  
                $inserir=NULL;
              
                  return TRUE;
                
             else :
                return FALSE;
            endif; 
            
        } catch (Exception $exc) {
         return $exc->getMessage();
        }
    
       return TRUE;
     }
}
