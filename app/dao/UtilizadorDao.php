<?php



/**
 * Description of UtilizadorDao
 *
 * @author ismael_7il
 */
class UtilizadorDao extends BasePadraoSql{
    
   
    
    /**
     * 
     * @param Utilizador $dados
     * @return boolean
     */
    public function registar(Utilizador $dados) {
           $securty = new SegurancaDao();
           $securty->destroyToken();
         try {
            parent::setTabela('utilizador');
            parent::setCampos('nome,sobrenome,telefone,genero,dataNasc,email,senha,foto,nivel');
            parent::setDados(':nome,:sobrenome,:telefone, :genero,:dataNasc,:email, :senha,:foto,:nivel');
            $inserir = parent::inserir();

            $inserir->bindParam(':nome', $dados->_getNome(), PDO::PARAM_STR);
            $inserir->bindParam(':sobrenome', $dados->_getSobrenome(), PDO::PARAM_STR);
            $inserir->bindParam(':telefone', $dados->_getTelefone(), PDO::PARAM_INT);
            $inserir->bindParam(':genero', $dados->_getGenero(), PDO::PARAM_STR);
            $inserir->bindParam(':dataNasc', $dados->_getDataNascimento(), PDO::PARAM_STR);
            $inserir->bindParam(':email', $dados->_getEmail(), PDO::PARAM_STR);
            $inserir->bindParam(':senha', $dados->_getSenha(), PDO::PARAM_STR);
            $inserir->bindParam(':foto', $dados->_getFoto(), PDO::PARAM_STR);
            $inserir->bindParam(':nivel', $dados->_getNivel(), PDO::PARAM_INT);
            
              $retorno =$inserir->execute();
             
               $dados->setIdUlizador(parent::getId()->lastInsertId());  
               
              // $securty->criarSession($dados);
              
              if ($retorno) :
                  
                  
                  $validarLogin = $this->validarLogin($dados);
              
                  if($validarLogin):
                      
                     return $validarLogin;
                  
                 endif;
                    /**
                 * remover o statment da memoria
                 */
               
               else :
                   return FALSE; 
                
            endif;
              
            
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    
        
        }
        
        /**
         * 
         * @param Utilizador $dados
         * @return boolean
         */
    public function alterarDados(Utilizador $dados) {
      $securty = new SegurancaDao();
     try {   
            parent::setTabela('utilizador');
            parent::setCampos('nome=(:nome),sobrenome=(:sobrenome),telefone=(:telefone),genero=(:genero),dataNasc=(:dataNasc),email=(:email),foto=(:foto)');
            parent::setValorPesquisa('idUser=(:idUser)');
            $alterar = parent::alterar();

            $alterar->bindParam(':nome', $dados->_getNome(), PDO::PARAM_STR);
            $alterar->bindParam(':sobrenome', $dados->_getSobrenome(), PDO::PARAM_STR);
            $alterar->bindParam(':telefone', $dados->_getTelefone(), PDO::PARAM_INT);
            $alterar->bindParam(':genero', $dados->_getGenero(), PDO::PARAM_STR);
            $alterar->bindParam(':dataNasc', $dados->_getDataNascimento(), PDO::PARAM_STR);
            $alterar->bindParam(':email', $dados->_getEmail(), PDO::PARAM_STR);
            $alterar->bindParam(':foto', $dados->_getFoto(), PDO::PARAM_STR);
            $alterar->bindParam(':idUser', $dados->_getIdUlizador(), PDO::PARAM_INT);

            $retorno = $alterar->execute();
            /**
             * destroir a sseion do formulario
             */
             $securty ->destroyToken();
             
             /**
              * eliminar a session e cria novamente
              */
              $securty->destroiSession();
              
              /**
               * criar nova session 
               */
               $securty->criarSession($dados);
               
            if( $retorno):
                      
                      return TRUE;
                  
              
                 else:
                     return FALSE;

               endif;
            
            
           } catch (Exception $exc) {
            return $exc->getMessage();
        }  
      
        }
        
        
        public function validaEmail($usa) {
             $securty = new SegurancaDao();
            
      try {
            parent::setTabela('utilizador');
            parent::setCampos('email');
            parent::setValorPesquisa('email=(:email) LIMIT 1');

            $selecionaUmCampo = parent::selecionaMaisCampos();
            $selecionaUmCampo->bindParam(':email',$usa, PDO::PARAM_STR);
            
            $selecionaUmCampo->execute();
            /**
             * destroir a session que vem do formulario
             */
            $securty->destroyToken();

            if ( $selecionaUmCampo->rowCount() == 1):
                // A QUE ESTAMOS A PEGAR OS DADOS DE VOLTA


                return TRUE;

            else:
                return FALSE;

            endif;
        } catch (Exception $exc) {
                 echo $exc->getMessage();
             }

            
        }
        
        
        
        /**
         * 
         * @param Utilizador $usa
         * @return boolean
         */
        public function validarLogin(Utilizador $usa) {
             $securty = new SegurancaDao();
            
      try {
            parent::setTabela('utilizador');
            parent::setCampos('idUser,sobrenome,email,senha,nivel,foto');
            parent::setValorPesquisa('email=(:email) AND senha=(:senha) LIMIT 1');

            $selecionaUmCampo = parent::selecionaMaisCampos();
            $selecionaUmCampo->bindParam(':email', $usa->_getEmail(), PDO::PARAM_STR);
            $selecionaUmCampo->bindParam(':senha', $usa->_getSenha(), PDO::PARAM_STR);
            $selecionaUmCampo->execute();
            /**
             * destroir a session que vem do formulario
             */
            $securty->destroyToken();

            if ( $selecionaUmCampo->rowCount() == 1):
                // A QUE ESTAMOS A PEGAR OS DADOS DE VOLTA

                $dados = $selecionaUmCampo->fetch(PDO::FETCH_OBJ);

                /**
                 * cria a session do usario com dados pessoas
                 */
                $securty->criarSession($dados);
                $securty->setLogado($dados); //passar a referencia do usuario que logo
                return TRUE;

            else:
                return FALSE;

            endif;
        } catch (Exception $exc) {
                 echo $exc->getMessage();
             }

            
        }
        /**
         * função que vai cancelar a conta do utilizador
         */
        public function cancelarConta() {
            
            $login=$_SESSION['login'];
            
            try {
                parent::setTabela('utilizador');
                parent::setValorPesquisa('idUser=(:idUser) AND email=(:email)');
                $excluir = parent::excluir();
                $excluir->bindParam(':idUser', $login->idUser, PDO::PARAM_INT);
                $excluir->bindParam(':email', $login->email, PDO::PARAM_STR);
                $retorno = $excluir->execute();
          
                
              if ($retorno) :
              
                unset($result);
                //unset($_SESSION['login']);
               // unset($_SESSION['sie_dono']);
              
                $this->efectuarLogout();
            
            endif;
                
                
            } catch (Exception $ex) {
                $ex->getMessage();
            }
            return TRUE; 
        }
        
      /**
     * função que vai fazer o lougaut do usuario
     * @return type
     */
       public function efectuarLogout() {
        $_SESSION['login']=NULL;
        $_SESSION['sie_dono']=NULL;
           unset($_SESSION);
        session_destroy();
        
        header("Location:" .META_URL);
        exit;
    } 
    
      /**
     * metodo que vai se responablizar pela alteração da palvra passe do 
     * @param Estudante $dados
     */
        public function alterarPalavraPasse($senhaAntiga, $senhaNova){
           
            $login=$_SESSION['login'];
            
           try {
               parent::setTabela('utilizador');
            parent::setCampos('senha');
            parent::setValorPesquisa('email =(:email) AND senha =(:senha)');
            $selecionaUmCamp = parent::selecionaMaisCampos();
            $selecionaUmCamp->bindParam(':email', $login->email, PDO::PARAM_STR);
            $selecionaUmCamp->bindParam(':senha', $senhaAntiga, PDO::PARAM_STR);
            $selecionaUmCamp->execute();

            if ($selecionaUmCamp->rowCount() == 1):
                parent::setCampos('senha=(:senha)');
                parent::setValorPesquisa('idUser=(:idUser)');
                $alterar = parent::alterar();

                $alterar->bindParam(':senha', $senhaNova, PDO::PARAM_STR);
                $alterar->bindParam(':idUser', $login->idUser, PDO::PARAM_INT);
                $reto = $alterar->execute();

                if ($reto):
                    return TRUE;

                else:

                    return FALSE;

                endif;

            endif;
        } catch (Exception $exc) {
               
               
               echo $exc->getMessage();
           }
             
         
     }
    /**
     *  metodo que vai fazer a busca do dados que se deseja alterar
     * @return type
     */
    public function buscarAdmin(){
         $login=$_SESSION['login'];
        
         try {
            parent::setTabela('utilizador');
            parent::setValorPesquisa('utilizador.idUser =(:idUser)');
            $selecionaTudo_ComCondicao = parent::selecionaTudo_ComCondicao();

            $selecionaTudo_ComCondicao->bindParam(':idUser', $login->idUser, PDO::PARAM_INT);
            $selecionaTudo_ComCondicao->execute();
            $dado = $selecionaTudo_ComCondicao->fetch(PDO::FETCH_OBJ);

            unset($selecionaTudo_ComCondicao);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return $dado;
    }
    
    
      /**
    *Função que vai contar o Numero de pessoas registado na aplicação
    * @param type $id
    */ 
 public function contarCadastro() {
       try{
           
        parent::setCampos('idUser, count(*) as Quantidade');
         parent::setTabela('utilizador');
         $selecionaMaisCampos = parent::selecionaCompo_SemCondicao();
            $selecionaMaisCampos->execute();
        
             $noemia=$selecionaMaisCampos->fetch(PDO::FETCH_OBJ);
       
        //unset($selecionaMaisCampos);
         
      
       } catch (Exception $exc) {
        return $exc->getMessage();
       }   
     return $noemia;
 } 
    
}
