 <?php


/**
 *  RotasController_Cntl ESTA É A CLASSE RESPONSAVEL PELA ROTAS DA APLICAÇÃO QUE VAI PODE CHAMAR CADA FORMULARIO COM AJUDA DA CLASSE ControllerChamada
 *
 * @author ismael_7il
 */
class Rotas_ extends ControllerChamada{

      /*
     * INDEX PRINCIPAL
     */

    public function index() {
        ControllerChamada::view('index');
    }
 
    public function consultar() {
        ControllerChamada::view('FormConsultar');
    }
    
     /**
     *  metodo pra consultar evento
     * @param Evento $ev
     * @return boolean
     */
     public function consulta(){
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
     * função que vai verficar se a email exite no banco de dados quando usuario digita no formulario
     */
    public function verificar() {
        $securty = new SegurancaDao;
        // $securty->verficarToken($_POST['sie_sofil']);

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $cnx = Conexao::chamaConexao();
        $listar = $cnx->prepare("select email from utilizador where email= '$email'");
        $listar->execute();

        if ($listar->rowCount() == 1):
            echo 1;
        else:
            echo 0;
        endif;
    }

    /**
     * rota pra chamar o formulario do login
     */
    public function autenticar() {
        ControllerChamada::view('FormLogin');
    }

    public function FormRecuperaSenha() {
        ControllerChamada::view('FormRecuperaSenha');
    }
    /**
     * rota pra acessar a saida do usuario
     */
    public function logout() {
        $usar = new UtilizadorDao();
        $usar->efectuarLogout();
    }

    /*
     * rota pra chamar o formulario pra indicar disponiblidade
     */

    public function FormIndicarDesponiblidade() {
        ControllerChamada::view('FormIndicarDesponiblidade');
    }
     public function FormAlterarDesponiblidade() {
        ControllerChamada::view('FormAlterarDesponiblidade');
    }
    /**
     * ROTA QUE VAI CHAMAR A FUNÇÃO QUE CANCELA CONTA
     */
    public function cancelaConta() {

        $dao = new UtilizadorDao();
        $cancelarC = $dao->cancelarConta();
        if ($cancelarC):
            header("Location:" . META_URL);
        endif;
    }

    /**
     * rota pra acessar o formulario pra alterar a palvra pass
     */
    public function alterarPalavraPasse() {
        ControllerChamada::view('FormAlterarPalavraPasse');
    }
    
    public function alertar() {
        ControllerChamada::view('FormAlertar');
    }


    /* * ***********************************************
     * ROTAS QUE ESTAO RELACIONADO SO COM ADMINISTADOR
     */

    public static function perfilAdmin() {
        ControllerChamada::view('FormPerfilAdministrador');
    }

    public function formAlterarAdmin() {
        ControllerChamada::view('FormAlterarDadosAdministrador');
    }
        /*   controller que vai poder chamar o formulario pra registar o DOCENTE*/ 
    public function formRegistaDocente() {
        ControllerChamada::view('FormDocente');
    }

    public function registarSala() {
        ControllerChamada::view('FormSala');
    }

    public function registarAdmin() {
        ControllerChamada::view('FormAdmin');
    }

     public function listarDocente() {
        ControllerChamada::view('FormListarDocente');
    }

    /* * **********************************
     * ROTAS RELACIONADAS SO COM DOCENTE
     *
     */

    public function formAlterarDocente() {
        ControllerChamada::view('FormAlterarDadosDocente');
    }

    /* controller pra chamar o formulario do Docente */

    public static function perfilDocente() {
        ControllerChamada::view('FormEventosPublicados');
    }

    public function listarIncricoes() {
        ControllerChamada::view('FormListarInscricao');
    }
    /********************************************
     *  ROTAS RELACIONADAS AO ESTUDANTE
     *
     */
    public function formRegistaEstudante() {

        ControllerChamada::view('FormEstudante');
    }


    /**
     * controller que vai chamar o formulario de alteração dos dados do usuario
     */
    public function FormAlterarDadosEstudante() {
        ControllerChamada::view('FormAlterarDadosEstudante');
    }

    /**
     * controller que vai chamar o perfil do estudante
     */
    public static function perfilEstudante() {
        ControllerChamada::view('FormEventosPublicados');
    }

    /*     * ***********************************
     *  ROTAS QUE ESTAO RELACIONADA COM EVENTO
     */

    public function formAlterarEstado() {
        ControllerChamada::view('FormAlterarEstado');
    }

    /**
     * rota pra chamada do formulario da data e hora
     */
    public function formDataHora() {
        ControllerChamada::view('FormDataHora');
    }

    /**
     *
     */
    public function formRegistaEvento() {
        ControllerChamada::view('FormEvento');
    }

/**
     * rota pra listar os eventos do docente
     */

    public function formMeusEvento() {
        ControllerChamada::view('FormMeusEventos');
    }
      public function FormContagemDaDisponiblidade() {
        ControllerChamada::view('FormContagemDaDisponiblidade');
    }
    /**
     * rotanpra chamar o formulario pra selecionar um convidado
     */
    public function FormSelecionarConvidado() {
        ControllerChamada::view('FormSelecionarConvidado');
    }

    /**
     * rota pra chamar o formulario pra alterar os dados do evento
     */
    public function formAlterarDadosEvento() {
        ControllerChamada::view('FormAlterarDadosEvento');
    }

    /**
     *
     */
    public function concedePirievilegio() {
        ControllerChamada::view('FormConcederPrevilegio');
    }

    /**
     * pra chamar o formulario de atribuição de privilegio
     */
    public function fromEventoPriveligiado() {
        ControllerChamada::view('FormEventoPrivilegiado');
    }


}
