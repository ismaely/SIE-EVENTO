<?php



/**
 * Description of ComentarioDao
 *
 * @author ismael_7il
 */
class ComentarioDao extends BasePadraoSql{
    
     public function inserirComentario(Comentario $comenta) {
                      
           $securty = new SegurancaDao; 
        try {
            parent::setTabela('comentario');
            parent::setCampos('data, hora, mensagem, idEvento, idUser');
            parent::setDados(':data, :hora, :mensagem, :idEvento, :idUser');
            $inserir = parent::inserir();
            $inserir->bindParam(':data', $comenta->getData(), PDO::PARAM_STR);
            $inserir->bindParam(':hora', $comenta->getHora(), PDO::PARAM_STR);
            $inserir->bindParam(':mensagem', $comenta->getMensagem(), PDO::PARAM_STR);
            $inserir->bindParam(':idEvento', $comenta->getIdEvento(), PDO::PARAM_INT);
            $inserir->bindParam(':idUser', $comenta->getId_idUser(), PDO::PARAM_INT);
            $retorno =  $inserir->execute();

            $securty->destroyToken();

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
     *  função responsavel pra buscar o nome , foto , data , hora de pessoa que comento e 
     * @param type $id
     * @return type
     */
    public function buscarComentario($id) {
          $busca =  array();
          $cont=0;

        try {
            parent::setCampos('idUser, idComentario');
            parent::setTabela('comentario');
            parent::setValorPesquisa('idEvento =(:idEvento) ORDER BY idComentario DESC');
            $selecionaMaisCampos = parent::selecionaMaisCampos();
            $selecionaMaisCampos->bindParam(':idEvento', $id, PDO::PARAM_INT);
            $selecionaMaisCampos->execute();
            
             if (  $selecionaMaisCampos->rowCount() > 0): 
              while( $ites = $selecionaMaisCampos->fetch(PDO::FETCH_OBJ)): 
                 
                  parent::setCampos('nome, foto, data, hora, mensagem');
                    parent::setTabela('utilizador, comentario');
                    parent::setValorPesquisa('utilizador.idUser =(:idUser) AND idComentario=(:idComentario) AND comentario.idEvento=(:idEvento)');
                    $selecionaMaisCampo = parent::selecionaMaisCampos();

                    $selecionaMaisCampo->bindParam(':idUser', $ites->idUser, PDO::PARAM_INT);
                    $selecionaMaisCampo->bindParam(':idComentario', $ites->idComentario, PDO::PARAM_INT);
                    $selecionaMaisCampo->bindParam(':idEvento', $id, PDO::PARAM_INT);
                    $selecionaMaisCampo->execute();

                    $cont +=1;
                    $busca[$cont] = $selecionaMaisCampo->fetch(PDO::FETCH_OBJ);
                    

                endwhile;
             endif;
            unset($selecionaMaisCampo);
       unset($selecionaMaisCampos);
            
         
       
        } catch (Exception $ex) {
        return $exc->getMessage();
        }
     
       return $busca; 
    }
     
}
