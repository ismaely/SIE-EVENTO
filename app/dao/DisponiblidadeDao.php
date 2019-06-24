<?php



/**
 * Description of DisponiblidadeDao
 *
 * @author ismael_7il
 */
class DisponiblidadeDao extends BasePadraoSql {
   
    
     public function indicar(Disponibilidade $dados){
          $securty = new SegurancaDao;
      try {
          
          parent::setCampos('dataEscolhida, hora_Inicio, hora_fim, idEvento, idUser');
          parent::setTabela('disponibilidade');
          parent::setDados(':dataEscolhida, :hora_Inicio, :hora_fim, :idEvento, :idUser');
          $inserir = parent::inserir();
          
           $inserir->bindParam(':dataEscolhida', $dados->getDataEscolhida(), PDO::PARAM_STR);
           $inserir->bindParam(':hora_Inicio', $dados->getHora_Inicio(), PDO::PARAM_STR);
           $inserir->bindParam(':hora_fim', $dados->getHora_fim(), PDO::PARAM_STR);
           $inserir->bindParam(':idEvento',  $dados->getId_Evento(),PDO::PARAM_INT);
           $inserir->bindParam(':idUser', $dados->getIdUser(),PDO::PARAM_INT);
            $retorno =$inserir->execute();
            
            $securty->destroyToken();
            
            if ($retorno) {
                $result=NULL;
                
               return TRUE;
               
            } else {
                return FALSE;
            }
      
      } catch (Exception $ex) {

      }
    
     }
     
     
    /**
    * Função que vai alterar a disponiblidade de um dado evento.. quando usario quero trocar
    * @return boolean
    */
    public function alterar(Disponibilidade $dados){
     
        try{
             parent::setTabela('disponibilidade');
             parent::setCampos('dataEscolhida=(:dataEscolhida), hora_Inicio=(:hora_Inicio), hora_fim=(:hora_fim)');
             parent::setValorPesquisa('idDisp=(:idDisp)');
             $alterar = parent::alterar();
             
             $alterar->bindParam(':dataEscolhida', $dados->getDataEscolhida(), PDO::PARAM_STR);
            $alterar->bindParam(':hora_Inicio', $dados->getHora_Inicio(), PDO::PARAM_STR);
            $alterar->bindParam(':hora_fim', $dados->getHora_fim(), PDO::PARAM_STR);
            $alterar->bindParam(':idDisp', $dados->getIdUser(), PDO::PARAM_INT);
            $retorno = $alterar->execute();
            
            
            $securty->destroyToken();
            
            if ($retorno) {
                
                $result=NULL;
                $cnx=null;
               
            } else {
                return FALSE;
            } 
             
        } catch (Exception $ex) {

        }
     
      return TRUE; 
    }
     
    
  /**
    * metodo responsavel pela contagem das diponiblidade em função das datas
    * @param type $id
    */ 
 public function contarDisponibilidade($id) {
       try{
           
        parent::setCampos('idEvento, dataEscolhida,hora_Inicio,hora_fim, count(*) as Quantidade');
         parent::setTabela('disponibilidade');
         parent::setValorPesquisa('idEvento =(:idEvento) GROUP BY idEvento,dataEscolhida,hora_Inicio,hora_fim');
         $selecionaMaisCampos = parent::selecionaMaisCampos(); 
            $selecionaMaisCampos->bindParam(':idEvento',$id, PDO::PARAM_INT);
            $selecionaMaisCampos->execute();
        
        return  $selecionaMaisCampos;
        //unset($selecionaMaisCampos);
         
      
       } catch (Exception $exc) {
        return $exc->getMessage();
       }   
    
 } 
    
    
 /**
     * 
     * @param type $id
     * @return boolean
     */
    public function SelecionarDisponiblidade($id){
          $login=$_SESSION['login'];   
          try {
            parent::setTabela('disponibilidade');
            parent::setValorPesquisa('idEvento = (:idEvento) AND idUser=(:idUser)');
            $selecionaTudo = parent::selecionaTudo_ComCondicao();

            $selecionaTudo->bindParam(':idEvento', $id, PDO::PARAM_INT);
            $selecionaTudo->bindParam(':idUser', $login->idUser, PDO::PARAM_INT);
           $selecionaTudo->execute();

            if ($selecionaTudo->rowCount() > 0):

                return TRUE;


            else:

                return FALSE;

            endif;
        } catch (Exception $exc) {
            return $exc->getMessage(); 
        }
    }
    
    
    /**
     * função que vai buscar a disponiblidade que se deseja alterar de um dado usuario...
     * @param type $id
     * @return boolean
     */
  public function buscarDisponiblidade($id){
          $login=$_SESSION['login'];
        try {
            parent::setCampos('idDisp');
            parent::setTabela('disponibilidade');
            parent::setValorPesquisa('idEvento =(:idEvento) AND idUser=(:idUser) LIMIT 1');
            $selecionaUmCampo = parent::selecionaMaisCampos();   // função que esta retorna a query

            $selecionaUmCampo->bindParam(':idEvento', $id, PDO::PARAM_INT);
            $selecionaUmCampo->bindParam(':idUser', $login->idUser, PDO::PARAM_INT);
            $selecionaUmCampo->execute();

            if ($selecionaUmCampo->rowCount() > 0):
                $item = $selecionaUmCampo->fetch(PDO::FETCH_OBJ);
            
                parent::setValorPesquisa('idDisp=(:idDisp) AND idEvento = (:idEvento) AND idUser=(:idUser) LIMIT 1');
                $selecionaTudo = parent::selecionaTudo_ComCondicao();

                $selecionaTudo->bindParam(':idDisp', $item->idDisp, PDO::PARAM_INT);
                $selecionaTudo->bindParam(':idEvento', $id, PDO::PARAM_INT);
                $selecionaTudo->bindParam(':idUser', $login->idUser, PDO::PARAM_INT);
                $selecionaTudo->execute();

                $item = $selecionaTudo->fetch(PDO::FETCH_OBJ);

            else:

                return FALSE;

            endif;
        } catch (Exception $exc) {
            return $exc->getMessage(); 
        }
        
       return $item;  
    } 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
