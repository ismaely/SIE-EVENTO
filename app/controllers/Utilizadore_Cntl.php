<?php

/* este é a classe menu controller pra utilizador a vai se extender a classe controllerCamada que esta na pasta system, que é 
 * responsavel pra chamar as views
 */
class Utilizadore_ extends ControllerChamada{
   
    
    
         /* CONTROLLER que vai verficar se O EMAIL exite para o docente*/
        public function verificar(){
         $securty = new SegurancaDao;
         
        $email = $securty->validarCaracter($_POST['email']);
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
          *  CONTROLLER  que vai receber os dados da alteração da palavra pass
          */
    public function validarPassword(){
              
        $dao = new UtilizadorDao();
        $estu = new Utilizador();
        $securty = new SegurancaDao();

        $securty->verficarToken(isset($_POST['sie_sofil']) ? $_POST['sie_sofil'] : '');
        $senhaAntiga = $securty->validarCaracter($_POST['senhaantiga']);
        $senhaNova = $securty->validarCaracter($_POST['novasenha']);
        $confirma = $securty->validarCaracter($_POST['confirmarsenha']);

        if ($senhaAntiga == NULL || $senhaAntiga == '' || strlen($senhaAntiga) < 8 || $senhaNova == NULL || $senhaNova == '' || strlen($senhaNova) < 8):
            echo "	<script type=\"text/javascript\">
			alert ('a sua senha não é valido');history.back();
			</script>
			";

        endif;

        $senhaAntiga = $securty->criptografarSenha($senhaAntiga);
        $senhaNova = $securty->criptografarSenha($senhaNova);
        $confirma = $securty->criptografarSenha($confirma);


        /**
         * chamada do metdo que vai alterar a palvra pass
         */
        if ($senhaNova != $confirma):

            Mensagem::setSucesso('Nao foi possivel alterar a senha ..são diferente');
            Rederizar::redirecionar();

        else:
            $pass = $dao->alterarPalavraPasse($senhaAntiga, $senhaNova);

            if ($pass):
                Mensagem::setSucesso('alteração realizada com sucesso');
                Rederizar::redirecionar();

            else:
                Mensagem::setSucesso('erro na senha não foi possivel');
                Rederizar::redirecionar();
            endif;

        endif;
    }  
        
    /**
                *  CONTROLLER PRA VERFICAR OS DADOS DO LOGIN QUE VEM DO FORMULARIO
            */
      public function Login() {
          
        $log = new UtilizadorDao();
        $util = new Utilizador();
        $securty = new SegurancaDao();

        $securty->verficarToken(isset($_POST['sie_sofil']) ? $_POST['sie_sofil'] : '');

        $email = $_POST['email'];
        $senha = $_POST['senha'];
         
       // $securty->codigoMalicioso($senha, $email);

        $email = $securty->validarCaracter($email);
       
        $senha = $securty->validarCaracter($senha);

        $senha = $securty->criptografarSenha($senha);

        $util->setEmail($email);
        $util->setSenha($senha);

   /* chamada do metodo pra validar */
        $fil = $log->validarLogin($util);
        
        // aque é onde vamos rederizar o perfil
        
        
       
        if ($fil):
            $securty->logs($email);
            $login = $_SESSION['login'];
            $securty->geraCodigo();
             
            unset($_SESSION['email']); // eliminar a session do formulario d login
              $hora=date('H');
            if(( $hora >=0) && ( $hora<12)):
               Mensagem::setSucesso('Bom Dia: '.$login->sobrenome);
            Rederizar::redirecionar(); 
            endif;
            
             if(( $hora >=13) && ( $hora<18)):
               Mensagem::setSucesso('Boa Tarde : '.$login->sobrenome);
            Rederizar::redirecionar(); 
            endif;
            if(( $hora >=18) && ( $hora<=23)):
               Mensagem::setSucesso('Boa Noite : '.$login->sobrenome);
            Rederizar::redirecionar(); 
            endif;
        else:
            $_SESSION['email']=$email;
            Mensagem::setErro('dados errado.. verfica a senha e o email');
            header("Location:" . LOGIN);
        endif;

        /* caso o usario nao lougar com sucesso */
        
    }
    
    
    // controller que recebe os dados do formulario para serem cadastrado
     public function validarDados(){
   
           $securty = new SegurancaDao;
            $daout = new UtilizadorDao();
             $daoest = new EstudanteDao();
             $doce = new DocenteDao();
             $admin = new AdministradorDao();
             $ut = new Utilizador();
             $estu = new Estudante;
             $docent = new Docente;
             $adm = new Administrador;
             
         $securty->verficarToken($_POST['sie_sofil']);
         
        $opcao = $_POST['opcao'];
        $nome =$securty->validarCaracter($_POST['nome']);
        $sobreNome = $securty->validarCaracter($_POST['sobrenome']);
        $nascimento =$_POST['data_nascimento'];
        $email = $securty->validarCaracter($_POST['email']);
        $senha = (isset($_POST['senha'])? $securty->validarCaracter($_POST['senha']): NULL);
        $telefone =$_POST['telefone'];
        $genero =$_POST['genero'];
        
        $id =(isset($_POST['id'])? $_POST['id']: NULL);
        $curso = (isset($_POST['curso'])? $_POST['curso']: NULL);
        $numero_estudante =(isset($_POST['numeroEstudante'])?$securty->validarCaracter( $_POST['numeroEstudante']): 0);
        $grauAcademico = (isset( $_POST['grau'])?  $_POST['grau']: NULL);
        $especialidade =(isset($_POST['especialidade'])? $_POST['especialidade']: NULL);
        
        /**
         * validado alguns campos 
         */
        
         if(!is_string($telefone)):
             echo "	<script type=\"text/javascript\">
			alert ('o seu numero de Telefone  não valido');history.back();
			</script>
			";
             exit();
            endif;
            
        
           if(!$securty->ValidarEmail($email)):
            echo "	<script type=\"text/javascript\">
			alert ('o Seu email não é valido');history.back();
			</script>
			";
             exit();
           endif;
           
           if($sobreNome==NULL || $sobreNome=='' || strlen($sobreNome)<2):
                echo "	<script type=\"text/javascript\">
			alert ('o seu Sobrenome nao é valido');history.back();
			</script>
			";
                 exit();
           endif;
         if($nome==NULL || $nome=='' || strlen($nome)<4):
                echo "	<script type=\"text/javascript\">
			alert ('o Nome nao é valido');history.back();
			</script>
			";
         exit();
               
           endif;
           
          if($daout->validaEmail($email)){
              echo "	<script type=\"text/javascript\">
			alert ('O email ja existe');history.back();
			</script>
			";
              
               exit();
          } 
        
        // Constrói a data no formato ANSI yyyy/mm/dd
        $data_temp = explode('/', $nascimento);
        $nascimento = $data_temp[2].'/'.$data_temp[1].'/'.$data_temp[0];
        
        /*verfiar os dados do ficheiro*/
        $imagem_nome = $_FILES['foto']['name'];
        $imagem_tipo = $_FILES['foto']['type'];
        $imagem_tamanho = $_FILES['foto']['size'];

        
        
        if (!empty($imagem_nome)):

            if (($imagem_tipo == 'image/JPG') ||($imagem_tipo == 'image/bmp') || ($imagem_tipo == 'image/gif') || ($imagem_tipo == 'image/png') || ($imagem_tipo == 'image/jpg') || ($imagem_tipo == 'image/jpeg') || ($imagem_tipo == 'image/pdf')):

                if (( $imagem_tamanho > 0) && ( $imagem_tamanho <= TAMANHO)):
                    $pasta_alvo = UPLOAD_PASTA . $imagem_nome;
                    move_uploaded_file($_FILES['foto']['tmp_name'], $pasta_alvo);
                else:

                     Mensagem::setSucesso('A imagem nao foi pssivel guardar é muito grande');
                endif;
            else:
                echo "	<script type=\"text/javascript\">
			alert ('o formato da imagem não é valido');history.back();
			</script>
			";
                exit();
                Rederizar::redirecionar(); 
                exit;
            endif;

        else:
            
            
            $imagem_nome = '';
        endif;
       
        
        
      /**
       * chamada da função que vai verficar se a senha é um codigo 
       */  
      $securty->codigoMalicioso($senha,'');     
        
        try { 
            
           
            $ut->setNome(strtolower($nome));
            $ut->setSobrenome(strtolower($sobreNome));
            $ut->setDataNascimento($nascimento);
            $ut->setTelefone($telefone);
            $ut->setEmail(strtolower($email));
            $ut->setSenha($securty->criptografarSenha($senha));
            $ut->setGenero($genero);
            $ut->setFoto($imagem_nome);
            
            $estu->setNumero($numero_estudante);
            $estu->setCurso($curso);
            
            $docent->setGrauAcademico(trim($grauAcademico));
            $docent->setEspecialidade( $securty->validarCaracter($especialidade));
            /**
             * CHAMADA DA FUNÇÃO PRA CADASTRAR USUARIO
             */
            // Onde vai ser cadastrado estudante
            
            
            if ($opcao == '040323'):

                $ut->setNivel(NIVEL_ESTUDANTE);

                $registar = $daout->registar($ut);
                 
                 $estu->setId_Estudante($ut->_getIdUlizador());
                
                if ($registar):
                    
                    $registarCurso = $daoest->registarCurso($estu); 
                
                     if ( $registarCurso):
                         Mensagem::setSucesso('usuario cadastrado com sucesso seja bem vindo:');
                         
                         Rederizar::redirecionar();
                     
                    endif;
                endif;

            endif;

            // onde vai ser chamado o meto de registro pra docente
            if ($opcao == '206373'):
                $ut->setNivel(NIVEL_DOCENTE);

                if ($daout->registar($ut)):

                    $docent->setId_Docente($ut->_getIdUlizador());
                
                    $registarCurso=$doce->registarDocente($docent);
//                    if ():
                     var_dump($ut);
                      echo '<p>';
                     var_dump($registarCurso);
                     echo '<p>';
                     print_r($registarCurso);
                     echo '<p>';
                     die();
                    Mensagem::setSucesso('Docente :'. $ut->_getNome().' Foi Cadastrado com sucesso ');
                     Rederizar::redirecionar();

//                    endif;

                endif;

            endif;
            /** onde vai chamar a função pra registrar admin
             * admin
             */
            if ($opcao == '08120203'):

                $ut->setNivel(NIVEL_ADMIN);

                if ($daout->registar($ut)):
                    
                    $adm->setId_admin($ut->_getIdUlizador());

                      $admin->registarAdmin($adm);
                        
                         Mensagem::setSucesso('Admin cadastrado com sucesso seja ');
                       Rederizar::redirecionar();
                         
                    

                endif;

            endif;

            /* opção alterar chamar a função que vai alterar os dados do docente, estudante, admin */
            if ($opcao == "altestudante"):
               $ut->setNivel(NIVEL_ESTUDANTE);
                $ut->setIdUlizador($id);
                $estu->setId_Estudante($id);
                /* chamada do metdo que vai alterar os dados do estudante */
                $alterarDados = $daout->alterarDados($ut);
                
                    if ($alterarDados):
                    
                    $alterarCurso = $daoest->alterarCurso($estu);
                   
                        if ( $alterarCurso):
                        /* chamada do controller do perfildo estudante */
                             Mensagem::setSucesso('dados alterado com sucesso..');
                     Rederizar::redirecionar();
                    endif;

                endif;

            endif;

            if ($opcao == "altdocente"):

                $ut->setIdUlizador($id);
                     $ut->setNivel(NIVEL_DOCENTE);
                $setId_Docente = $docent->setId_Docente($id);
                /* chamada do metdo que vai alterar os dados do docente */
                $alterarDado = $daout->alterarDados($ut);
                
                   if ($alterarDado):

                   $registarDocente = $doce->alterarDocente($docent);

                   
                endif;
                 Mensagem::setSucesso('dados alterado com sucesso :');
                 Rederizar::redirecionar(); 

            endif;

            if ($opcao == "altadmin"):

                $ut->setIdUlizador($id);
                $ut->setNivel(NIVEL_ADMIN);
                /* chamada do metdo que vai alterar os dados do Admin */
                $alterarDad= $daout->alterarDados($ut);
                if ($alterarDad):
                     Mensagem::setSucesso('dados alterado com sucesso :');
                    /* chamada do controller do perfildo estudante */
                   Rederizar::redirecionar();
                
                endif;

            endif;
        } catch (Exception $exc) {
            echo "".$exc->getMessage();
        }
           
              
        
    }
    
    
      
    
    
    
    
}
