<?php


class InscricaoDao extends BasePadraoSql{
  
    /**
     *  funço que vai registtrar a inscrição do usuario a um dado evento
     * @param Inscricao $inscricao
     * @return boolean
     */
    public function fazerIncricao(Inscricao $inscricao){
              $login = $_SESSION['login'];
        try {
            parent::setTabela('inscricao');
            parent::setCampos('dataInscricao, hora, idEvento, email, idUser');
            parent::setDados(':dtInscricao, :hora, :idEvento, :email, :idUser');
            $inserir = parent::inserir();
            $inserir->bindParam(':dtInscricao', $inscricao->getDataInscricao());
            $inserir->bindParam(':hora', $inscricao->getHora());
            $inserir->bindParam(':idEvento', $inscricao->getId_Evento(), PDO::PARAM_INT);
            $inserir->bindParam(':email', $login->email, PDO::PARAM_STR);
            $inserir->bindParam(':idUser', $login->idUser, PDO::PARAM_INT);

            $retorno = $inserir->execute();

            if ($inserir->rowCount() == 1):
                
                unset($inserir);
            
                return TRUE;

            else :
                return FALSE;
            endif;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
    
   /*
    * função que vai registar os dados de um convidado
    */
    public function selecionarConvidado($nome,$email,$idEvento){
     
        $securty = new SegurancaDao();
          try {
            parent::setCampos('nomeConvidado, emailConvidado idEvento');
            parent::setTabela('convidado');
            parent::setDados(':nomeConvidado, :emailConvidado, :idEvento');
            $inserir0 = parent::inserir();
            
            $inserir0->bindParam(':nomeConvidado', $nome, PDO::PARAM_STR);
            $inserir0->bindParam(':emailConvidado', $email, PDO::PARAM_STR);
            $inserir0->bindParam(':idEvento', $idEvento, PDO::PARAM_INT);
            $retorno = $inserir0->execute();

            $securty->destroyToken();
            if ($retorno) :

                return TRUE;

            else :
                return FALSE;
            endif;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }       
   }
  
   /**
    * metodo que vai eleminar a inscrição
    * @param Inscricao $inscricao
    * @return boolean
    */
   public function cancelarIncricao(Inscricao $inscricao){
       $login = $_SESSION['login'];
        try {

            parent::setTabela('inscricao');
            parent::setValorPesquisa('idEvento=(:idEvento) AND idUser=(:idUser)');

            $excluirCom_MaisCondicao = parent::excluir();
            $excluirCom_MaisCondicao->bindParam(':idEvento', $inscricao->getId_Evento());
            $excluirCom_MaisCondicao->bindParam(':idUser', $login->idUser);
            $excluirCom_MaisCondicao->execute();

            if ($excluirCom_MaisCondicao->rowCount() == 1) :
                
                unset($excluirCom_MaisCondicao);

            else :

                return FALSE;

            endif;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
      return TRUE;
    }
       
    

    /**
     * função que vai buscar ou selecionar todos as inscriçoes de um usuario que deve indicar a sua deponiblidade a cada invento
     * @return type
     */
   public function listarInscricoesIndarDesponiblidade($id){
      $login=$_SESSION['login'];
      $guarda =  array();
     
        
      try {

            parent::setTabela('inscricao');
            parent::setCampos('idEvento');
            parent::setValorPesquisa('inscricao.idEvento=(:idEvento) AND inscricao.idUser =(:idUser) ORDER BY idInscricao ASC');
            $selecionaMaisCampos = parent::selecionaMaisCampos();

            $selecionaMaisCampos->bindParam(':idEvento', $id, PDO::PARAM_INT);
            $selecionaMaisCampos->bindParam(':idUser', $login->idUser, PDO::PARAM_INT);
            $selecionaMaisCampos->execute();

            if ($selecionaMaisCampos->rowCount() == 1) {
                $sie = $selecionaMaisCampos->fetch(PDO::FETCH_OBJ);
                
                parent::setTabela('datahora');
                parent::setValorPesquisa('datahora.idEvento =(:idEvento)');
                $selecionaTudo_ComCondicao = parent::selecionaTudo_ComCondicao();
                $selecionaTudo_ComCondicao->bindParam(':idEvento', $id, PDO::PARAM_INT);
                $selecionaTudo_ComCondicao->execute();

                $guarda = $selecionaTudo_ComCondicao->fetchAll(PDO::FETCH_OBJ);
            }
            $selecionaMaisCampos = NULL;
            $selecionaTudo_ComCondicao = NULL;
        } catch (Exception $exc) {

            return $exc->getMessage();
        }

        return $guarda;
    }
   
   /**função que vai verficar se usuario esta inscrito no evento... ( e para ocultar o botao inscrição e mostra o botao cancelar)
    * 
    * @param type $id
    * @return boolean
    */
   public function validarBotaoInscr($id) {
           $securty = new SegurancaDao();
            $login=$_SESSION['login'];

        try {
            parent::setTabela('inscricao');
            parent::setCampos('idEvento, idUser');
            parent::setValorPesquisa('idEvento =(:idEvento) AND idUser =(:idUser) ORDER BY idInscricao ASC');
            $selecionaMaisCampos = parent::selecionaMaisCampos();
            $selecionaMaisCampos->bindParam(':idEvento', $id, PDO::PARAM_INT);
            $selecionaMaisCampos->bindParam(':idUser', $login->idUser, PDO::PARAM_INT);
            $selecionaMaisCampos->execute();

                 
            if ($selecionaMaisCampos->rowCount() == 1):
               
                return TRUE;
               
            else:
                return FALSE;
            
            endif;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

    /*
     * função que vai buscar o idEvento do evento na tabela datahora caso exite,, pra ser indicado disponiblidade
     */
    public function validarBotaoDisponiblidade($id) {
           $securty = new SegurancaDao();

        try {
            parent::setTabela('datahora');
            parent::setCampos('idEvento');
            parent::setValorPesquisa('datahora.idEvento =(:idEvento) ORDER BY id ASC');
            $selecionaMaisCampos0 = parent::selecionaMaisCampos();
            $selecionaMaisCampos0->bindParam(':idEvento', $id, PDO::PARAM_INT);
            $selecionaMaisCampos0->execute();
                 
            if ($selecionaMaisCampos0->rowCount() > 1):
               
                return TRUE;
               
            else:
                return FALSE;
            
            endif;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
    
    /**
     * Função que vai listar todos utilizador inscrito em um dado evento especifico
     * @param type $id
     * @return int
     */
    public function listarInscricoes($id){
     
      $guarda = array();
      $cont = 0;

        try {

            parent::setTabela('inscricao');
            parent::setCampos('idEvento, idUser');
            parent::setValorPesquisa('inscricao.idEvento=(:idEvento) ORDER BY idInscricao ASC');
            $selecionaMaisCampos = parent::selecionaMaisCampos();

            $selecionaMaisCampos->bindParam(':idEvento', $id, PDO::PARAM_INT);
            $selecionaMaisCampos->execute();

            if ($selecionaMaisCampos->rowCount() > 0) {


                parent::setTabela('utilizador');
                parent::setCampos('idUser,nome,sobrenome,telefone,genero,email,foto');
                parent::setValorPesquisa('idUser=(:idUser)');
                $selecionaUmCampo = parent::selecionaMaisCampos();

                while ($item = $selecionaMaisCampos->fetch(PDO::FETCH_OBJ)) {
                    $selecionaUmCampo->bindParam(':idUser', $item->idUser, PDO::PARAM_INT);
                    $selecionaUmCampo->execute();

                    $cont +=1;
                    $guarda[$cont] = $selecionaUmCampo->fetch(PDO::FETCH_OBJ);
                }
            }
            
            
            $selecionaMaisCampos = NULL;
            $selecionaUmCampo = NULL;
        } catch (Exception $exc) {

            return $exc->getMessage();
        }

        return $guarda;
    }
   
    
     /**
    *Função que vai contar o Numero de pessoas inscritos pra cada invento
    * @param type $id
    */ 
 public function contarInscricao($id) {
     
       try{
           
        parent::setCampos('idEvento, idUser, count(*) as Quantidade');
         parent::setTabela('inscricao');
         parent::setValorPesquisa('idEvento =(:idEvento)');
         $selecionaMaisCampos = parent::selecionaMaisCampos(); 
            $selecionaMaisCampos->bindParam(':idEvento',$id, PDO::PARAM_INT);
            $selecionaMaisCampos->execute();
        
             $noemia=$selecionaMaisCampos->fetch(PDO::FETCH_OBJ);
       
            unset($selecionaMaisCampos);
         
      
       } catch (Exception $exc) {
        return $exc->getMessage();
       }   
     return $noemia;
 } 
   
}
