<?php


class PrivilegioDao extends BasePadraoSql{


    /**
     * função que vai se encarregar de atribuição de privilegio caso o priveligiado existe no sistema ...
     * @param Privilegio $privi
     * @return boolean
     */
  public function conceder(Privilegio $privi){

   try {   /**
           *  A que estamos a fazer uma busca pra verficar se o usario existe no sistema
          */
            parent::setTabela('utilizador');
            parent::setCampos('idUser, telefone');
            parent::setValorPesquisa('utilizador.email= ? LIMIT 1');
            $selecionaUmCampo = parent::selecionaMaisCampos();
            $selecionaUmCampo->bindValue(1, $privi->getEmail(), PDO::PARAM_STR);
            $selecionaUmCampo->execute();

            $dado = $selecionaUmCampo->fetch(PDO::FETCH_OBJ);
            $id = $dado->idUser; //recupera o id do usario que se fez a busca pelo telefone
           /**
            * a que esta a ser preparado o inserte pra o previlegio
            */
            parent::setTabela('privilegio');
            parent::setCampos('grau,idEvento,email,telefone,idUser');
            parent::setDados(':grau,:idEvento,:email,:telefone,:idUser');
            $inserir = parent::inserir();
            $inserir->bindValue(':grau', $privi->getGrau(), PDO::PARAM_INT);
            $inserir->bindValue(':idEvento', $privi->getId_Evento(), PDO::PARAM_INT);
            $inserir->bindValue(':email', $privi->getEmail());
            $inserir->bindValue(':telefone', $privi->getTelefone(), PDO::PARAM_INT);

            //verficar se a busca exite no banco ou seja  se o seu numero de telefone esta no banco
            if ($selecionaUmCampo->rowCount() == 1): 
                 
            $inserir->bindValue(':idUser', $id, PDO::PARAM_INT);
            $retorno = $inserir->execute(); // executar a query caso a busca foi verdadeira pelo numero de telefone

             if ($retorno) :
                 
                return TRUE;

                 unset($inserir);
                 unset($selecionaUmCampo);
                 endif;
            
                /**
                 * caso o numero de telefone nao existe no banco entao vai se fazer a busca pelo email
                 */
            else :
            parent::setCampos('idUser, email');
            parent::setValorPesquisa('utilizador.telefone = ? LIMIT 1');
            $selecionaUmCamp = parent::selecionaMaisCampos();
            $selecionaUmCamp->bindValue(1, $privi->getTelefone());
            $selecionaUmCamp->execute();
                
                         $dado=  $selecionaUmCamp->fetch(PDO::FETCH_OBJ);
                          $id=$dado->idUser; //recupera o id do usario que se fez a busca pelo email
                          //verficar se abusca pelo email exte no banco
                       if ($selecionaUmCamp->rowCount() == 1):
                         
                            $inserir->bindValue(':idUser', $id, PDO::PARAM_INT);
                            $retorno =  $inserir->execute(); //executar a query caso o email exite na bd
                            
                           return TRUE;
                          
                          else :
                          
                        return FALSE;
                          
                      endif;
                      
                  unset($selecionaUmCamp);
                 unset($inserir);
                
            endif;
                 
        
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
   }

  

    /**
     *  função que vai se responsablizar pela autualização do estado
     * @param type $id
     * @param type $previlegio
     * @param type $idEvento
     * @return boolean
     
     public function alterarPrevilegio(Privilegio $privi) {

        try {
            $cnx = Conexao::chamaConexao();
            $sql = 'UPDATE privilegio SET grau=:grau,idEvento=:idEvento,email=:email,telefone=:telefone,idUser=:idUser';
            $sql .='WHERE idUser=:idUser';
            $result = $cnx->prepare($sql);
            $result->bindValue(':grau', $privi->getNivel(), PDO::PARAM_INT);
            $result->bindValue(':idEvento', $privi->getId_Evento(), PDO::PARAM_INT);
            $result->bindValue(':email', $privi->getEmail());
            $result->bindValue(':telefone', $privi->getTelefone(), PDO::PARAM_INT);
            $result->bindValue(':idUser', $privi->getId_Evento(), PDO::PARAM_INT);
            $retorno = $result->execute();
           
             if( $retorno):

                return TRUE;

                unset($result);
                $retorno=NULL;
                $cnx= NULL;
                 else:
                return FALSE;
             endif;

            } catch (Exception $exc) {
            return $exc->getMessage();
        }

    } */

   
   
   
   /**
    * funçoes que sera usada pra eventos com privilegio de cada usuario
    */

    public function buscarDados($idEv){
               $login=$_SESSION['login'];
        try {
            parent::setTabela('privilegio');
            parent::setValorPesquisa('idEvento = ? AND idUser= ?');
            $selecionaTudo_ComCondicao = parent::selecionaTudo_ComCondicao();
            
            $selecionaTudo_ComCondicao->bindValue(1, $idEv, PDO::PARAM_INT);
            $selecionaTudo_ComCondicao->bindValue(2,  $login->idUser, PDO::PARAM_INT);
            $selecionaTudo_ComCondicao->execute();
            $dados = $selecionaTudo_ComCondicao->fetch(PDO::FETCH_OBJ);

             if($dados):
              return $dados;
             
              else:
              return FALSE;
                  
              endif;
               
                unset($selecionaTudo_ComCondicao);
             } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
   
      
    /**
     * função que vai selecionar todos eventos com privilegio de cada usuario caso existe
     * @param type $idEv
     * @return boolean
     */
      public function eventosPrivilegiado(){
        $login=$_SESSION['login'];
        $guarda =  array();
        $guarda=NULL;
        $cont=0;
        try {
            /**
             * montagem da 1ª query que se faz consulta de alguem com privilegio
             */
            parent::setCampos('idEvento,idUser');
            parent::setTabela('privilegio');
            parent::setValorPesquisa('privilegio.idUser=? ORDER BY idPrivilegio DESC');
            $selecionaMaisCampos = parent::selecionaMaisCampos();
            $selecionaMaisCampos->bindValue(1, $login->idUser, PDO::PARAM_INT);
            $selecionaMaisCampos->execute();
            
             if ($selecionaMaisCampos->rowCount() > 0):
                 /*
                  * 2ºquery montado a query que vai buscar idEvento e idSala de cada evento 
                  */
            parent::setCampos('idEvento, idSala');
            parent::setTabela('evento');
            parent::setValorPesquisa('evento.idEvento=? ORDER BY idEvento DESC');
             $selecionaMaisCamp = parent::selecionaMaisCampos(); 
            /**
             * 3ª query montagem da segunda query que vai selecionar o evento e a sala de alguem com privilegio em função da 1ªquery 
             */
             parent::setTabela(' evento, sala');
             parent::setValorPesquisa('evento.idSala=? AND sala.idSala = ? ORDER BY idEvento DESC');
             $selecionaTudo_ComCondicao0 = parent::selecionaTudo_ComCondicao();
            
           // extrair todos os dados da 1ª query que se fez consulta com fetch
             while( $item = $selecionaMaisCampos->fetch(PDO::FETCH_OBJ)): 
               
                 // consulta da 2ª query a ser realizada pra cada evento 
              $selecionaMaisCamp->bindValue(1, $item->idEvento, PDO::PARAM_INT);
              $selecionaMaisCamp->execute();
              
              // esta a fazer o fetch da 2ª query e aramazenar na variavel $vgl
              $vgl = $selecionaMaisCamp->fetch(PDO::FETCH_OBJ);
             
              //esta fazer a busca da 3ª query enfunção da busca da 2ªquery.. pra cada da 
              $selecionaTudo_ComCondicao0->bindValue(1, $vgl->idSala, PDO::PARAM_INT);
              $selecionaTudo_ComCondicao0->bindValue(2, $vgl->idSala, PDO::PARAM_INT);
              $selecionaTudo_ComCondicao0->execute();
              
                  $cont +=1;
                  //armazenar os dados em array da 3ª query em um array cada vez que o ciculo gira
                  $guarda[$cont]= $selecionaTudo_ComCondicao0->fetch(PDO::FETCH_OBJ);
           
              endwhile;
          
          else:
              
              return 0;
                  
          endif;
                 $cnx=NULL;
                 unset($result);
                 unset( $resulta);
                 unset(  $resul);
                 
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
             
       return $guarda;
        
    }


}
