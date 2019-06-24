<?php

/*  
 * CLASSE RESPONSAVEL POR RECEBER OS DADOS QUEM VEM DO FORMULARIO,, PRA SEREM CADASTRADO E VALIDADOS
 */
class Evento_ {
   
    
    /**
     * CONNTROLLER RESPONSAVEL PELA VALIDAÇÃO DO PRIVILEGIO, QUE RECEBE OS DADOS QUE VEM DO FORMULARIO CONCEDER PRIVILEGIO
     */
    public function validarPrivilegio() {
        
        $idEvento = isset($_POST['idEvento'])? $_POST['idEvento'] : NULL;
        $grau = isset($_POST['previlegio'])? $_POST['previlegio'] : NULL;
        $email = isset($_POST['email'])? $_POST['email'] : NULL;
        $telefone = isset($_POST['telefone'])? $_POST['telefone'] : NULL;

        $prev = new Privilegio();
        $dao = new PrivilegioDao();

        $prev->setId_Evento($idEvento);
        $prev->setGrau($grau);
        $prev->setTelefone($telefone);
        $prev->setEmail($email);

        //die($dao->conceder($prev));
        if ($dao->conceder($prev)):
            Mensagem::setSucesso('privilegio atribuido com sucesso');
            Rederizar::redirecionar();

        else:
            Mensagem::setErro('Nao foi possivel fazer atribuição do prviligio o usario nao esta registrado');
              Rederizar::redirecionar();
            
        endif;
    }

    /**
     * rota que recebe os dados do formulario de indicação de disponiblidade
     */
    public function validarDisponiblidade() {

        $securty = new SegurancaDao;
         $login=$_SESSION['login'];
        $securty->verficarToken($_POST['sie_sofil']);

        $disp = new Disponibilidade;
        $dao_disp = new DisponiblidadeDao;  

        $idEvento = isset($_POST['idEvento']) ? $_POST['idEvento'] : 0;
        $idAltera = isset($_POST['idAlterar']) ? $_POST['idAlterar'] : 0;
        $ddata = isset($_POST['data']) ? $_POST['data'] : NULL;
        $horaInicio = isset($_POST['horaInicio']) ? $_POST['horaInicio'] : NULL;
        $horaFim = isset($_POST['horaFim']) ? $_POST['horaFim'] : NULL;
        $disp->setId_Evento($idEvento);
        $disp->setDataEscolhida($ddata);
        $disp->setHora_Inicio($horaInicio);
        $disp->setHora_fim($horaFim);
       


            if($idEvento!=0):
              $disp->setIdUser($login->idUser);
        if ($dao_disp->indicar($disp)):
            Mensagem::setSucesso('Indicação realizada com sucesso.. ');
            Rederizar::redirecionar();
        // echo 'indicação com sucesso';
          endif;
        
         endif;
         
         if ($idAltera!=0):
             $disp->setIdUser($idAltera);
         
             if($dao_disp->alterar($disp)):
                Mensagem::setSucesso('Disponiblidade alterada com sucesso.. ');
            Rederizar::redirecionar();  
                 
             endif;
             
         endif;
         
    }

    /* controller que vai validar os dados do comentario */

    public function validarComentario() {
        $login=$_SESSION['login'];
        $securty = new SegurancaDao;
        $securty->verficarToken(isset($_POST['sie_sofil']) ? $_POST['sie_sofil'] : '');

        $idEvento = $_POST['idEvento'];
        $mensagem = $securty->validarCaracter($_POST['comentario']);

        $comentar = new Comentario();
        $cmdao = new ComentarioDao();

        $data = date('Y-m-d');
        $hora = date('H:i:s');
        $comentar->setData($data);
        $comentar->setHora($hora);
        $comentar->setMensagem($mensagem);
        $comentar->setIdEvento($idEvento);
        $comentar->setId_idUser($login->idUser);


        $inserirComentario = $cmdao->inserirComentario($comentar);

        if ($inserirComentario):
             Mensagem::setSucesso('Comentado com sucesso ');
            Rederizar::redirecionar();

        endif;
    }

    /**
     * controller responsavel pela consulta
     */
    public function consultar() {

        $busca = array();
        $cont = 0;
        $nome = $_POST['nomeEvento'];

        $cnx = Conexao::chamaConexao();
        $result = $cnx->prepare("select nomeEvento from evento where email= '$email'");
        $result->execute();

        if ($listar->rowCount() == 1):

            // foreach ($guarda as $item => $value)
            foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $item) {
                $cont +=1;
                $busca[$cont] = $result[$item];
            }
            // echo 1;
            echo json_encode($busca);
        else:
            echo 0;
        endif;
       
    }

    /*  A QUE É ONDE ESAMOS RECEBER OS DADOS DO FORMULARIO DA DEFINIÇÃO DA DATA E HORA */

    public function registarDataHata() {

        $evet = new Evento;
        $daoEv = new EventosDao();
        $securty = new SegurancaDao();

        $id = (isset($_POST['id']) ? $_POST['id'] : NULL);
        $dataRealiz = (isset($_POST['dataRealiz']) ? $_POST['dataRealiz'] : NULL);
        $hora_inicioRealiz = (isset($_POST['hora_inicioRealiz']) ? $_POST['hora_inicioRealiz'] : NULL);
        $hora_fimRealiz = (isset($_POST['hora_fimRealiz']) ? $_POST['hora_fimRealiz'] : NULL);

        $evet->setDataRealiz($dataRealiz);
        $evet->setHora_inicioRealiz($hora_inicioRealiz);
        $evet->setHora_fimRealiz($hora_fimRealiz);
        $evet->setIdEvento($id);

        if ($daoEv->definirDataHoraRealizacao($evet)):
           Mensagem::setSucesso('Data e Hora definida com sucesso ');
            Rederizar::redirecionar();
        endif;
    }

    /**
     * controler qu recebe os dados do formulario alterar estado
     */
    public function alterarEstado() {
        $securty = new SegurancaDao;
        $evet = new Evento;
        $dao = new EventosDao();

        $securty->verficarToken($_POST['sie_sofil']);
        $estado = (isset($_POST['estado']) ? $_POST['estado'] : 1);
        $id = (isset($_POST['id']) ? $_POST['id'] : NULL);

        $evet->setIdEvento($id);
        $evet->setEstado($estado);


        // var_dump($ado);
        // die();
        if ($dao->alterarEstado($evet)):
            Mensagem::setSucesso('Alteração realizada com Sucesso da Data e Hora');
            Rederizar::redirecionar();
        endif;
    }

    /**
     * a que é onde vai receber os dado do evento que se pretende ser cancelado
     */
    public function eventoCancelado() {
        $system = new System; // chanciamento da classe system que responsavel pela url .. é onde recebemos os dados e onde esta defindo o arrqui do projecto
        $securty = new SegurancaDao(); // estanciamento da classe
        $dao = new EventosDao();
        $evet = new Evento;

        $cancela = $securty->criptografarUrl('cancelar'.$_SESSION['codigo']);
        // verficar a chave da cripografia se é igual

       if ($system->get_chave() == $cancela && $system->get_dados() != 0):
           // $evet->setEstado(5);
          $evet->setIdEvento($system->get_dados());

            $cancel = $dao->cancelar($evet);
             
            unset( $_SESSION['codigo']);
            if( $cancel):
                Mensagem::setSucesso('Evento eliminado.');
                $securty->geraCodigo();
              Rederizar::redirecionar();
            
            else:
                 Mensagem::setSucesso('Não foi possivel cancelar o evento .. Acesso negado ..');
              Rederizar::redirecionar();
         endif;

        else:
              echo '<h1> <strong>  OPS: ACESSO NEGADO......403 </strong></h1>';
           // echo '<h1><strong>  OPS: ERRO INTERNO.... AS NOSSAS SINCERAS DESCULPA..ERRO 500</strong></h1>';
        endif;
    }

    /**
     * CONTROLLER RESPONSAVEL PELA VALIDAÇÃO DE REGISTRO DO EVENTO
     */
    public function validarDados() {
        $securty = new SegurancaDao;
        $securty->verficarToken($_POST['sie_sofil']);

        
        $nome = $securty->validarCaracter($_POST['nomeEvento']);
        $dataLimite = $_POST['datalimiteInscric'];
        $horaLimite = $_POST['horalimite'];
        $dataRealiz = (isset($_POST['dataRealiz']) ? $_POST['dataRealiz'] : NULL);
        $hora_inicioRealiz = (isset($_POST['hora_inicioRealiz']) ? $_POST['hora_inicioRealiz'] : NULL);
        $hora_fimRealiz = (isset($_POST['hora_fimRealiz']) ? $_POST['hora_fimRealiz'] : NULL);
        $categoria = (isset($_POST['categoria']) ? $_POST['categoria'] : NULL);

        $data1 = (isset($_POST['data1']) ? $_POST['data1'] : NULL);
        $data2 = (isset($_POST['data2']) ? $_POST['data2'] : NULL);
        $horaIncio1 = (isset($_POST['horaInicio1']) ? $_POST['horaInicio1'] : NULL);
        $horaIncio2 = (isset($_POST['horaInicio2']) ? $_POST['horaInicio2'] : NULL);
        $horaFim1 = (isset($_POST['horaFim1']) ? $_POST['horaFim1'] : NULL);
        $horaFim2 = (isset($_POST['horaFim2']) ? $_POST['horaFim2'] : NULL);

        $sala = $_POST['sala'];
        $estado = (isset($_POST['estado']) ? $_POST['estado'] : NULL);
        $ambito = (isset($_POST['ambito']) ? $_POST['ambito'] : NULL);
        $descricao = $securty->validarCaracter($_POST['descricao']);

        $opcao = $_POST['opcao']; // variavel que tras opção se estipulo data ou nao.. o seja a opção sim ou nao
        $escolha = $_POST['escolha'];
        $id = (isset($_POST['id']) ? $_POST['id'] : NULL);
         $id1 = (isset($_POST['id1']) ? $_POST['id1'] : NULL);
          $id2 = (isset($_POST['id2']) ? $_POST['id2'] : NULL);

     if($nome==NULL || $nome==''):
         echo "	<script type=\"text/javascript\">
			alert ('prencha o nome');history.back();
			</script>
			";
     endif;
          
          
        /** A  QUE É ONDE VAI SER VALIDADO O ARQUIVO */
        $imagem_nome = $_FILES['foto']['name'];
        $imagem_tipo = $_FILES['foto']['type'];
        $imagem_tamanho = $_FILES['foto']['size'];

        if (!empty($imagem_nome)):

            if (($imagem_tipo == 'image/bmp') || ($imagem_tipo == 'image/gif') || ($imagem_tipo == 'image/png') || ($imagem_tipo == 'image/jpg') || ($imagem_tipo == 'image/jpeg') || ($imagem_tipo == 'image/pdf')):

                if (( $imagem_tamanho > 0) && ( $imagem_tamanho <= TAMANHO)):
                    $pasta_alvo = UPLOAD_PASTA . $imagem_nome;
                    move_uploaded_file($_FILES['foto']['tmp_name'], $pasta_alvo);

                else: 
                 Mensagem::setSucesso('o tamanho da imagem nao é ');
                endif;

            else:
              echo "	<script type=\"text/javascript\">
			alert ('Este formato não é valido');history.back();
			</script>";
            endif;

        else:
            $imagem_nome = NULL;
        endif;


        // estaciamento das classes que vao receber os dados 
        $daoEv = new EventosDao();
        $daoHora = new DataHoraDao();
        $evet = new Evento;
        $datas = new DataHora;

        /* passar os dados nas variavel da classe evento */
        $evet->setNome(strtolower($nome));
        $evet->setDescricao(strtolower($descricao));
        $evet->setCategoria($categoria);
        $datalim = explode('/', $dataLimite);
        $datalimt = $datalim[2] . '/' . $datalim[1] . '/' . $datalim[0];
        $evet->setDataLimiteInscricao($datalimt);

        $evet->setHoraLimiteInscricao($horaLimite);
        $evet->setId_Sala($sala);
        $evet->setEstado($estado);
        $evet->setAnexo($imagem_nome);
        $evet->setAmbito($ambito);
        $dataCriada = date('Y-m-d');
        $evet->setDataCriacao($dataCriada);

        if ($opcao == "nao"):

            $data = explode('/', $dataRealiz);
            $dataRealiza = $data[2] . '/' . $data[1] . '/' . $data[0];
            $evet->setDataRealiz($dataRealiza);

            $evet->setHora_inicioRealiz($hora_inicioRealiz);
            $evet->setHora_fimRealiz($hora_fimRealiz);
        endif;

        /* dados da tabela data hora */
        if ($opcao == "sim"):
            $data_ = explode('/', $data1);
            $data_1 = $data_[2] . '/' . $data_[1] . '/' . $data_[0];
            $datas->setDataEtipulada1($data_1);

            $data_tem = explode('/', $data2);
            $data_2 = $data_tem[2] . '/' . $data_tem[1] . '/' . $data_tem[0];
            $datas->setDataEtipulada2($data_2);
        endif;

        $datas->setHoraInicio1($horaIncio1);
        $datas->setHoraInicio2($horaIncio2);
        $datas->setHoraFim1($horaFim1);
        $datas->setHoraFim2($horaFim2);

        if ($escolha == "inserir"):
            unset( $_SESSION['codigo']);
            /* chamada do metodo que vai criar o evento */
            $resposta = $daoEv->criar($evet);

            $datas->setId_Evento($evet->getIdEvento());

            if ($opcao == "sim"):

                $daoHora->estipularDataHora($datas);
            endif;
            
             $securty->geraCodigo(); // função que gera um numero random que vai acresentar pra url
              Mensagem::setSucesso('Evento Criado com sucesso ..');
            Rederizar::redirecionar();
        endif;

        /* onde vai ser realizada alteração do evento e do anexo e das datas relativa a o evento */
        if ($escolha == "alterar"):
            $evet->setIdEvento($id);
            $datas->setId_Evento($id);

             unset( $_SESSION['codigo']);
            if ($daoEv->alterarDados($evet)):
 
                 if ($opcao == "sim"):
                     $definirD= $daoHora->alterarDataHora($datas,$id1,$id2);  //obs falta passar o id do evento
                    
                endif;
                
            endif;
            $securty->geraCodigo();
           Mensagem::setSucesso('Dados Alterado com Sucesso');
          Rederizar::redirecionar();
        endif;
    }

}
