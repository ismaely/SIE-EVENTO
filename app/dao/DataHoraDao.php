<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataHoraDao
 *
 * @author ismael_7il
 */
class DataHoraDao extends BasePadraoSql {
   
    
    
     public function estipularDataHora(DataHora $dados){
     
         try {
             parent::setTabela('datahora');
             parent::setCampos('dataEstipulada,horaInicio,horaFim,idEvento');
             parent::setDados(':dataEstipulada,:horaInicio,:horaFim,:idEvento');
             $inserir = parent::inserir();
             $inseri = parent::inserir(); 
             
            $inserir->bindParam(':dataEstipulada', $dados->getDataEtipulada1());
            $inserir->bindParam(':horaInicio', $dados->getHoraInicio1());
            $inserir->bindParam(':horaFim', $dados->getHoraFim1());
            $inserir->bindParam(':idEvento', $dados->getId_Evento());
            $retorno = $inserir->execute();
             
              if ($retorno) :
              
            
             $inseri->bindParam(':dataEstipulada', $dados->getDataEtipulada2());
             $inseri->bindParam(':horaInicio', $dados->getHoraInicio2());
             $inseri->bindParam(':horaFim', $dados->getHoraFim2());
             $inseri->bindParam(':idEvento', $dados->getId_Evento());
             $retorn =  $inseri->execute();
                  
                if($retorn):
                  
                  return TRUE;
                  
              endif;
                
              
             else :
                return FALSE;  
                  
                  
              endif;
            
          
         } catch (Exception $exc) {
           return $exc->getMessage();
         }
    
}

    /** 
    *  metodo que vai definir a data e hora de realização de um dado evento .. este vai actualizar a data e a hora pra realizar ja o evento
    * @param DataHora $dados
    */
   public function alterarDataHora(DataHora $dados, $id1, $id2){
     
        try {
             parent::setTabela('datahora');
             parent::setCampos('dataEstipulada=(:dataEstipulada),horaInicio=(:horaInicio),horaFim=(:horaFim),idEvento=(:idEvento)');
             parent::setValorPesquisa('id=(:id) AND idEvento=(:idEvento)');
             $alterarMais = parent::alterar();
             $aleraM= parent::alterarMais();
             
            $alterarMais->bindParam(':dataEstipulada', $dados->getDataEtipulada1());
            $alterarMais->bindParam(':horaInicio', $dados->getHoraInicio1());
            $alterarMais->bindParam(':horaFim', $dados->getHoraFim1());
            $alterarMais->bindParam(':id', $id1,  PDO::PARAM_INT);
            $alterarMais->bindParam(':idEvento', $dados->getId_Evento(),PDO::PARAM_INT);
            $retorno =  $alterarMais->execute();

            if($retorno):
                 
            $aleraM->bindParam(':dataEstipulada', $dados->getDataEtipulada2());
            $aleraM->bindParam(':horaInicio', $dados->getHoraInicio2());
            $aleraM->bindParam(':horaFim', $dados->getHoraFim2());
            $aleraM->bindParam(':id', $id2,  PDO::PARAM_INT);
            $aleraM->bindParam(':idEvento', $dados->getId_Evento(), PDO::PARAM_INT);
            $retorn = $aleraM->execute();     
                 
            
            
             if( $retorn):
                 
               
              unset($aleraM);
              unset($alterarMais);
                     
                     return TRUE;
                 endif;
                 
                 else:
                     
                     return FALSE;
                 
                 
             endif;
            
            
        
        } catch (Exception $exc) {
           return $exc->getMessage();
        }
        
   }

/**
    *  o metod que vai buscar a data e hora da tabela datahora que nao forma estipulada.. quando um evento ainda nao tem data nem 
     * hora de realização pra o evento
    * @param Evento $ev
    * @return boolean
    */
   public function buscarDataHoraRealiza($ev){
       
       try {
            parent::setTabela('datahora');

            parent::setValorPesquisa('datahora.idEvento =(:idEvento)');
            $selecionaTudo_ComCondicao = parent::selecionaTudo_ComCondicao();
            $selecionaTudo_ComCondicao->bindParam(':idEvento', $ev, PDO::PARAM_INT);
                 $selecionaTudo_ComCondicao->execute();
                  
//                 unset($selecionaTudo_ComCondicao);
        } catch (Exception $exc) {
           return $exc->getMessage(); 
        }

        return $selecionaTudo_ComCondicao; 
   }


   /**
    * funçoã responsavel pela busca da data e hora que vai ser alterada no evento
    * @param type $id
    * @return type
    */
   public function dataHoraIndefinida($id){
        $guarda = array();
        $guarda = NULL;
        $cont = 0;
       
      try {
           $buscarDataHoraRealiza = $this->buscarDataHoraRealiza($id);
           while ($row=$buscarDataHoraRealiza->fetch(PDO::FETCH_OBJ)):
             
               $cont +=1;
               $guarda[$cont] = $row;
        endwhile;
        
       unset($result);
     
      } catch (Exception $ex) {
 return $exc->getMessage();
      }   
        
return  $guarda;
   }




}