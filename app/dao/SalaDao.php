<?php


class SalaDao {
   
    /**
     * metodo que vai listar todas salas
     * @return $result
     */
    public function listarSala(){
     try {
            $cnx = Conexao::chamaConexao();
            $result = $cnx->prepare("SELECT * FROM sala");
            $result->execute();
         
           // $dados = $result->fetch(PDO::FETCH_OBJ);
             return  $result;
                
        } catch (Exception $exc) {
            return $exc->getMessage();
        }

   }
    
   /**
    *  metodo que vai ser usado para ser inserdo as salas
    * @param Sala $sala
    * @return boolean
    */
   public function registarSala(Sala $sala){
       $securty = new SegurancaDao;
       try {
            $cnx = Conexao::chamaConexao();

            $result = $cnx->prepare('INSERT INTO sala (numero, capacidade) VALUES (:numero, :capacidade);');
            $result->bindValue(':numero', $sala->getNumero(), PDO::PARAM_STR);
            $result->bindValue(':capacidade', $sala->getCapacidade(), PDO::PARAM_INT);
            $retorno = $result->execute();

            // chamada da função que vai destroir a session do formualrio da sala
            $securty->destroyToken();
            if ($retorno) :
               
                return TRUE;

            //unset($result);
            else :
                return FALSE;
            endif;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
   }
    
}
