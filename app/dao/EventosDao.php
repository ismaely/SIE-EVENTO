<?php

/** classe responsavel pelos eventos que são criado, listado, cancelar*/
class EventosDao extends BasePadraoSql{


  /**
   * metodo pra registra evento
   * @param Evento $evet
   * @return boolean
   */
    public function criar(Evento $evet){
        $securty = new SegurancaDao();
         $login=$_SESSION['login'];
     try {
         parent::setTabela('evento');
         parent::setCampos('nomeEvento,descricao,categoria,dtLimiteInscr,hrLimiteInscr,dataRealiza,horaInicioRealiza,horaFimRealiza,estado,ambito,dataCriacao,anexo,idSala,idDocente');
         parent::setDados(':nomeEvento,:descricao,:categoria,:dtLimiteInscr,:hrLimiteInscr,:dataRealiza,:horaInicioRealiza,:horaFimRealiza,:estado,:ambito,:dataCriacao,:anexo,:idSala,:idDocente');

         //chamada da query que vai montar o inserte
         $inserir = parent::inserir();
          $inserir->bindParam(':nomeEvento', $evet->getNome(), PDO::PARAM_STR);
             $inserir->bindParam(':descricao', $evet->getDescricao(), PDO::PARAM_STR);
             $inserir->bindParam(':categoria', $evet->getCategoria(), PDO::PARAM_STR);
             $inserir->bindParam(':dtLimiteInscr', $evet->getDataLimiteInscricao(), PDO::PARAM_STR);
             $inserir->bindParam(':hrLimiteInscr', $evet->getHoraLimiteInscricao());
             $inserir->bindParam(':dataRealiza', $evet->getDataRealiz());
             $inserir->bindParam(':horaInicioRealiza', $evet->getHora_inicioRealiz());
             $inserir->bindParam(':horaFimRealiza', $evet->getHora_fimRealiz());
             $inserir->bindParam(':estado', $evet->getEstado(),  PDO::PARAM_INT);
             $inserir->bindParam(':ambito', $evet->getAmbito(), PDO::PARAM_STR);
             $inserir->bindParam(':dataCriacao', $evet->getDataCriacao());
             $inserir->bindParam(':anexo', $evet->getAnexo(), PDO::PARAM_STR);
             $inserir->bindParam(':idSala', $evet->getId_Sala());
             $inserir->bindParam(':idDocente', $login->idUser);
             $retorno =  $inserir->execute();
             /* recuperando o ultimo id inserido */
              $evet->setIdEvento(parent::getId()->lastInsertId());

            /**vai destroir a session do formulario do evento*/
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
    * metodo que vai realizar actualização do evento
    * @param Evento $ev
    * @return boolean
    */
   public function alterarDados(Evento $evet){
      $securty = new SegurancaDao();

      try {
            parent::setTabela('evento');
            parent::setCampos('nomeEvento=(:nomeEvento),descricao=(:descricao),categoria=(:categoria),dtLimiteInscr=(:dtLimiteInscr),hrLimiteInscr=(:hrLimiteInscr),dataRealiza=(:dataRealiza),horaInicioRealiza=(:horaInicioRealiza),horaFimRealiza=(:horaFimRealiza),estado=(:estado),ambito=(:ambito),anexo=(:anexo),idSala=(:idSala)');

            parent::setValorPesquisa('idEvento=(:idEvento)');
            $alterar = parent::alterar();
            $alterar->bindParam(':nomeEvento', $evet->getNome(), PDO::PARAM_STR);
            $alterar->bindParam(':descricao', $evet->getDescricao(), PDO::PARAM_STR);
            $alterar->bindParam(':categoria', $evet->getCategoria(), PDO::PARAM_STR);
            $alterar->bindParam(':dtLimiteInscr', $evet->getDataLimiteInscricao(), PDO::PARAM_STR);
            $alterar->bindParam(':hrLimiteInscr', $evet->getHoraLimiteInscricao(), PDO::PARAM_STR);
            $alterar->bindParam(':dataRealiza', $evet->getDataRealiz(), PDO::PARAM_STR);
            $alterar->bindParam(':horaInicioRealiza', $evet->getHora_inicioRealiz(), PDO::PARAM_STR);
            $alterar->bindParam(':horaFimRealiza', $evet->getHora_fimRealiz());
            $alterar->bindParam(':estado', $evet->getEstado(), PDO::PARAM_STR);
            $alterar->bindParam(':ambito', $evet->getAmbito(), PDO::PARAM_STR);
            $alterar->bindParam(':anexo', $evet->getAnexo(), PDO::PARAM_STR);
            $alterar->bindParam(':idSala', $evet->getId_Sala(), PDO::PARAM_INT);
            $alterar->bindParam(':idEvento', $evet->getIdEvento(), PDO::PARAM_INT);
            $retorno = $alterar->execute();

            /* destroi a session do formulario de alterar do evento */
            $securty->destroyToken();

            if ( $alterar->rowCount() == 1):

                return TRUE;

            else:
                return FALSE;
            endif;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
   }

    /**
    * metodo responsavel pela busca de dados que se deseja de um dado evento especifico
    * @return type
    */
    public function buscarDados($ev){

        try {

            /* primeiro vai se fazer a busca do id da sala na propria tabela evento*/

            parent::setTabela('evento');
            parent::setValorPesquisa('evento.idEvento=(:idEvento) ORDER BY idEvento ASC');
            $selecionaTudo_ComCondicao = parent::selecionaTudo_ComCondicao();
            $selecionaTudo_ComCondicao ->bindParam('idEvento', $ev,  PDO::PARAM_INT);
             $selecionaTudo_ComCondicao ->execute();

            $resultado =  $selecionaTudo_ComCondicao ->fetch(PDO::FETCH_OBJ);

            unset( $selecionaTudo_ComCondicao );
        } catch (Exception $exc) {
            return $exc->getMessage();
        }

        return $resultado;
    }
    /**
     *  função responsavel pela busca do estado de cada evento
     * @param type $ev
     * @return type
     */
    public function buscarEstados($ev){

        try {

            /* primeiro vai se fazer a busca do id da sala na propria tabela evento*/
            parent::setTabela('estados');
            parent::setCampos('estado');
            parent::setValorPesquisa('id =(:id) LIMIT 1');
            $selecionaUm = parent::selecionaMaisCampos();
            $selecionaUm ->bindParam(':id', $ev,  PDO::PARAM_INT);
             $selecionaUm ->execute();

            $resultado = $selecionaUm ->fetch(PDO::FETCH_OBJ);

            unset($selecionaUm );
        } catch (Exception $exc) {
            return $exc->getMessage();
        }

        return $resultado;
    }


   /**
    * função que vai listar todos eventos de ambito (publico)
    * @return type
    */
    public function listarSoEvento(){
        $guarda = array();
        $guarda = NULL;
        $cont = 0;
        $publico='publico';
        try {
            parent::setTabela('evento');
            parent::setCampos('idEvento, idSala');
            parent::setValorPesquisa('ambito=(:ambito) ORDER BY idEvento DESC');
            $selecionaMaisCampos = parent::selecionaMaisCampos();
            $selecionaMaisCampos->bindParam(':ambito', $publico, PDO::PARAM_STR);
            $selecionaMaisCampos->execute();

            parent::setTabela('evento, sala');
            parent::setValorPesquisa('evento.idSala=(:idSala) AND sala.idSala =(:idSala) ORDER BY idEvento DESC');
            $selecionaTudo_ComCondicao = parent::selecionaTudo_ComCondicao();
            while ($item = $selecionaMaisCampos->fetch(PDO::FETCH_OBJ)) {

                $selecionaTudo_ComCondicao->bindParam(':idSala', $item->idSala, PDO::PARAM_INT);
                $selecionaTudo_ComCondicao->bindParam(':idSala', $item->idSala, PDO::PARAM_INT);
                $selecionaTudo_ComCondicao->execute();

                $cont +=1;
                $guarda[$cont] = $selecionaTudo_ComCondicao->fetch(PDO::FETCH_OBJ);

                // $buscaSo=$result->fetchAll(PDO::FETCH_ASSOC);
            }

            unset($selecionaMaisCampos);
            unset($selecionaTudo_ComCondicao );
        } catch (Exception $exc) {

            return $exc->getMessage();
        }
        return $guarda;
    }

    /**
     * METODO QUE VAI LISTAR o Evento QUE ESTA ASSOCIADO A CADA DOCENTE sala, datahora, utilizador, evento, comentario
     * @return type
     */
    public function listarEventoDocente() {
        $login = $_SESSION['login'];
        $busca = array();
        $cont = 0;
        try {
            parent::setCampos('idEvento, idSala');
            parent::setTabela('evento');
            parent::setValorPesquisa('idDocente = (:idDocente) ORDER BY idEvento DESC');
            $selecionaMaisCampos0 = parent::selecionaMaisCampos();
             $selecionaMaisCampos0 ->bindParam(':idDocente', $login->idUser, PDO::PARAM_INT);
             $selecionaMaisCampos0 ->execute();

             parent::setTabela('utilizador, evento, sala');
             parent::setValorPesquisa('utilizador.idUser=(:idUser) AND evento.idSala=(:idSala) AND sala.idSala =(:idSala) ORDER BY idEvento DESC');
             $selecionaTudo_ComCondicao = parent::selecionaTudo_ComCondicao();

             while ($item =  $selecionaMaisCampos0 ->fetch(PDO::FETCH_OBJ)) {

                 $selecionaTudo_ComCondicao->bindParam(':idUser', $login->idUser, PDO::PARAM_INT);
                 $selecionaTudo_ComCondicao->bindParam(':idSala', $item->idSala, PDO::PARAM_INT);
                 $selecionaTudo_ComCondicao->bindParam(':idSala', $item->idSala, PDO::PARAM_INT);
                 $selecionaTudo_ComCondicao->execute();

                $cont +=1;
                $busca[$cont] =  $selecionaTudo_ComCondicao->fetch(PDO::FETCH_OBJ);

            }

             $selecionaTudo_ComCondicao = NULL;
            $selecionaMaisCampos0 = NULL;
        } catch (Exception $exc) {

            return $exc->getMessage();
        }

        return $busca;
    }

    /**
     *  metodo pra consultar evento
     * @param Evento $ev
     * @return boolean
     */
     public function consultar(){
         $valor = $_GET['valor'];


               $cnx = Conexao::chamaConexao();
                 $result= $cnx->prepare("select * from utilizador where nome LIKE '%".$valor."%'");
                 $result->execute();
               //$result = $cnx->prepare("SELECT * FROM evento WHERE nome LIKE ?");
               //$result->bindValue("%:Nome%", $valor, PDO::PARAM_STR);
               //$retorno = $result->execute();

              while( $dados = $result->fetch(PDO::FETCH_OBJ)):

        echo "<a href=\"javascript:func()\" onclick=\"exibirConteudo('".$dados->idUser."')\">" . $dados->nome . "</a><br />";


    endwhile;
      }
      /***
       * função pra pegar os dados da consulta e mostra
       */
       public function exibir(){
         $id = $_GET['id'];


               $cnx = Conexao::chamaConexao();
                 $result= $cnx->prepare("select * from utilizador where idUser= '".$id."'");
                 $result->execute();
               //$result = $cnx->prepare("SELECT * FROM evento WHERE nome LIKE ?");
               //$result->bindValue("%:Nome%", $valor, PDO::PARAM_STR);
               //$retorno = $result->execute();

             $dados = $result->fetch(PDO::FETCH_OBJ);

             echo 'dados da lista'.$dados->nome.''. $dados->email ;


   header("Content-Type: text/html; charset=ISO-8859-1",true);
      }






      /**
       *  função que vai pode alterar o estado do evento que for solicitado..
       * @param Evento $dados
       * @return boolean
       */
    public function alterarEstado(Evento $dados){

        try {

            parent::setTabela('evento');
            parent::setCampos('estado=(:estado)');
            parent::setValorPesquisa('idEvento=(:idEvento)');
            $alterar0 = parent::alterar();
            $alterar0->bindParam(':estado', $dados->getEstado());
            $alterar0->bindParam(':idEvento', $dados->getIdEvento(), PDO::PARAM_INT);

            $retorno = $alterar0->execute();
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
    *  função que vai poder eliminar o evento
    * @param Evento $dados
    * @return boolean
    */
    public function cancelar(Evento $dados){

        try {
            parent::setTabela('evento');
            parent::setValorPesquisa('idEvento=(:idEvento)');
            $excluir = parent::excluir();
            $excluir->bindParam(':idEvento', $dados->getIdEvento(), PDO::PARAM_INT);
            $retorno =  $excluir->execute();
       
            

            if ($retorno) :

             unset($retorno);

                return TRUE;


            else :
                return FALSE;
            endif;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }



 /**
  * função que vai  definir a data e hora na tabela evento quando o realizador decide definir ja a data e a hora
  * @param Evento $dados
  * @return boolean
  */
    public function definirDataHoraRealizacao(Evento $dados){

        try {
            parent::setTabela('evento');
            parent::setCampos('dataRealiza=(:dataRealiza),horaInicioRealiza=(:horaInicioRealiza),horaFimRealiza=(:horaFimRealiza)');
            parent::setValorPesquisa('idEvento=(:idEvento)');
            $alterar1 = parent::alterar();
            $alterar1->bindParam(':dataRealiza', $dados->getDataRealiz(), PDO::PARAM_STR);
            $alterar1->bindParam(':horaInicioRealiza', $dados->getHora_inicioRealiz(), PDO::PARAM_STR);
            $alterar1->bindParam(':horaFimRealiza', $dados->getHora_fimRealiz(), PDO::PARAM_STR);
            $alterar1->bindParam(':idEvento', $dados->getIdEvento(), PDO::PARAM_INT);


            $retorno = $alterar1->execute();
            /**
             * verfica se foi alterado com sucesso
             * @retrun TRUE
             */
            if ($retorno):

                return TRUE;

            else:

            endif;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }




    /**
     * FUNÇÃO RESPONSAVEL QUE PEGA SO O NOME, genero, e a Foto DO UTILIZADOR POR CADA EVENTO
     * @param type $ids
     * @return type
     */
     public function buscarInformacao($ids){


         try {
            parent::setTabela('evento');
            parent::setCampos('idDocente');
            parent::setValorPesquisa('evento.idEvento =(:idEvento) ORDER BY idEvento ASC');
            $selecionaMaisCampos1 = parent::selecionaMaisCampos();

            $selecionaMaisCampos1->bindParam(':idEvento', $ids, PDO::PARAM_INT);
            $selecionaMaisCampos1->execute();


            if ($selecionaMaisCampos1->rowCount() > 0):
                $item = $selecionaMaisCampos1->fetch(PDO::FETCH_OBJ);

                parent::setTabela('utilizador');
                parent::setCampos('nome,genero,foto');
                parent::setValorPesquisa('idUser =(:idUser) ORDER BY idUser ASC');
                $selecionaMaisCampo = parent::selecionaMaisCampos();
                $selecionaMaisCampo->bindParam(':idUser', $item->idDocente, PDO::PARAM_INT);
                $selecionaMaisCampo->execute();

                $busca = $selecionaMaisCampo->fetch(PDO::FETCH_OBJ);

            endif;

            unset($selecionaMaisCampos1);
            unset($selecionaMaisCampo);
        } catch (Exception $exc) {

            return $exc->getMessage();
        }

        return $busca;
    }

  /**
   * função que vai retorna o estado em função do numero solicitado
   * @param type $di
   * @return string
   */
//    public function mostraEstado($di){
//
//          $estado=array(1=>'Cirado..mais não aberto a Inscrição',2=>'Aguardando Inscrições',3=>'Concluído..tudo ja definido',4=>'Inscrições Fechadas.. com datas ainda pra definir');
//
//          return $estado[$di];
//        }

























}
