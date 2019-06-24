<?php

/**
 * classe responsavel pela funcionalidade do estudante
 */
class EstudanteDao extends UtilizadorDao {

   
   
  
    /*
     * função responsavel pelo registro do  estudante
     * @param Utilizador $usa
     * @return boolean
     */

        public function registarCurso(Estudante $dados) {
            try {
          
            parent::setCampos('idUser, numero, curso');
            parent::setTabela('estudante');
            parent::setDados(':idUser, :numero, :curso');

            $inserir = parent::inserir();
            $inserir->bindParam(':idUser', $dados->getId_Estudante(), PDO::PARAM_INT);
            $inserir->bindParam(':numero', $dados->getNumero(), PDO::PARAM_STR);
            $inserir->bindParam(':curso', $dados->getCurso(), PDO::PARAM_STR);
            $retorno = $inserir->execute();


            if ($retorno) :
                // deve ser redirecionado na tela do pefil
                return $retorno;

            //unset($result);
            else :
                return $retorno;
            endif;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
       
       /**
        * metodo que vai actualizar os dados da tabela do estudante onde temos apenas o curso e numero
        * @param Estudante $dados
        * @return boolean
        */
   public function alterarCurso(Estudante $dados) {

        try {
            parent::setTabela('estudante');
            parent::setCampos('numero=:numero, curso=:curso');
            parent::setValorPesquisa('estudante.idUser=(:idUser)');
            $alterar = parent::alterar();
            $alterar->bindParam(':numero', $dados->getNumero(), PDO::PARAM_INT);
            $alterar->bindParam(':curso', $dados->getCurso(), PDO::PARAM_STR);
            $alterar->bindParam(':idUser', $dados->getId_Estudante(), PDO::PARAM_INT);
            $retorno = $alterar->execute();
            /**
             * verfica se foi alterado com sucesso
             * @retrun TRUE
             */
            if ($retorno):

                return TRUE;

            else:
                return FALSE;
            endif;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }

    }
    
  

    /**
     * metodo que vai fazer a busca do dados que se deseja alterar do estudante
     * @param Estudante $dados
     */
    public function buscarDados(){
           $login=$_SESSION['login'];
        try {
           
            parent::setTabela('utilizador, estudante');
            parent::setValorPesquisa('utilizador.idUser =(:idUser) AND estudante.idUser = (:idUser)');
            
             $selecionaTudo = parent::selecionaTudo_ComCondicao();
             $selecionaTudo->bindParam(':idUser', $login->idUser, PDO::PARAM_INT);
             $selecionaTudo->bindParam(':idUser', $login->idUser, PDO::PARAM_INT);
             $selecionaTudo->execute();
             
             $dados = $selecionaTudo->fetch(PDO::FETCH_OBJ);
            
                return $dados;
                unset($result);
                
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
    
   

}
