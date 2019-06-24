<?php

//use Conexao;

class DocenteDao extends UtilizadorDao {

   
    /**
     * 
     */
    public function efectuarLogout() {
        parent::efectuarLogout();
    }
   
   
    /**
     * função pra registar o docente... os seu dados pessoal
     * @param Docente $doce
     * @return boolean
     */
    public function registarDocente(Docente $dad) {

        try {
            
            parent::setTabela('docente');
            parent::setCampos('idUser, grauAcademico, especialidade');
            parent::setDados(':idUser, :grauAcademico, :especialidade');
            $inserir = parent::inserir();
            $inserir->bindParam(':idUser', $dad->getId_Docente(), PDO::PARAM_INT);
            $inserir->bindParam(':grauAcademico', $dad->getGrauAcademico(), PDO::PARAM_STR);
            $inserir->bindParam(':especialidade', $dad->getEspecialidade(), PDO::PARAM_STR);
            $retorno = $inserir->execute();
            
            
            /**  id do evento que esta relacionado com docente .. vai ser recebido apartir de uma sessionId toda vez que for necessario registar evento*/
            if ($retorno) :
               
               return TRUE;
                unset($inserir);
               
             else :
                return FALSE;
            endif;
            
        } catch (Exception $exc) {
            return $exc->getMessage();
        }

      
    }
    
    /**
     * metodo que vai fazer a busca do dados que se deseja alterar
     * @param Docente $dados
     */
     public function buscarDados(){
            $login=$_SESSION['login'];
        try {
            parent::setTabela('utilizador, docente');
            parent::setValorPesquisa('utilizador.idUser =(:idUser) AND docente.idUser =(:idUser)');
            $selecionaTudo_Com= parent::selecionaTudo_ComCondicao();
             $selecionaTudo_Com->bindParam(':idUser', $login->idUser);
             $selecionaTudo_Com->bindParam(':idUser', $login->idUser);
             $selecionaTudo_Com->execute();

           $dado =  $selecionaTudo_Com->fetch(PDO::FETCH_OBJ);
           unset( $selecionaTudo_Com);
          
           
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
        
       return $dado; 
    }

    
       /**
        * metodo que vai actualizar os dados da tabela do estudante onde temos apenas o curso e numero
        * @param Estudante $dados
        * @return boolean
        */
   public function alterarDocente(Docente $dados) {

        try {
            parent::setValorNaTabela('docente');
            parent::setCampos('grauAcademico=:grauAcademico, especialidade=:especialidade');
            parent::setValorPesquisa('idUser=(:idUser)');
            // chamando a função que vai retorna a sql ja montada
            $alterarMais = parent::alterar(); 
            $alterarMais->bindParam(':grauAcademico',$dados->getGrauAcademico(), PDO::PARAM_STR);
            $alterarMais->bindParam(':especialidade', $dados->getEspecialidade(), PDO::PARAM_STR);
            $alterarMais->bindParam(':idUser', $dados->getId_Docente(), PDO::PARAM_INT);
             $retorno = $alterarMais->execute();
            
             /**
              * verfica se foi alterado com sucesso
              * @retrun TRUE
              */
             if( $retorno):

                 return TRUE;

                 else:
                     return FALSE;
             endif;

            } catch (Exception $exc) {
            return $exc->getMessage();
        }

    }
    
   /**
    * função que vai listar todos o Docente que estam registado no sistema 
    * @return type
    */
    public function listarDocente(){
       $busca = array();
        $cont = 0;
        try {
            /**
             * 1ª query que vai selecionar os docente da tabela docente que estam registado
             */
            parent::setTabela('docente');
            $selecionaTudo = parent::selecionaTudo();
            $selecionaTudo->execute();

            /*
             * 2ªquery que vai selecionar todos os dados do docente que estam na tabela utilizador enfunção da 1ª query
             */
            parent::setTabela('utilizador,docente');
            parent::setCampos('idUser,nome,sobrenome,telefone,genero,email,foto');
            parent::setValorPesquisa('utilizador.idUser=(:idUser) AND docente.idUser=(:idUser) LIMIT 1');
            $selecionaUmCampo = parent::selecionaMaisCampos();

            /**
             * fazer a busca de cada dado com while.. 
             */
            while ($item = $selecionaTudo->fetch(PDO::FETCH_OBJ)) {
                $selecionaUmCampo->bindParam(':idUser', $item->idUser, PDO::PARAM_INT);
                $selecionaUmCampo->bindParam(':idUser', $item->idUser, PDO::PARAM_INT);
                $selecionaUmCampo->execute();

                $cont +=1;
                $busca[$cont] = $selecionaUmCampo->fetch(PDO::FETCH_OBJ); // aramazenar a busca no array 
            }
            unset($selecionaTudo);
            unset($selecionaUmCampo);
        } catch (Exception $ex) {
            
        }
        return $busca;
    }
    
    
    
    
    

 }
