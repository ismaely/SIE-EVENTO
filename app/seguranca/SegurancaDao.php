<?php

/** classe responsavel pela segurança da aplicação em algumas classe -*/

 class  SegurancaDao extends BasePadraoSql{
     
     
    private $logado =[];
   
   
   
  
     public function geraCodigo(){
         $_SESSION['codigo']=rand(3, 99000);
     }

     // função criar token de session
    public function criarToken() {

        $this->destroyToken();
        // session_destroy();;
        if (!isset($_SESSION['sie_evento'])) {

            $_SESSION['sie_evento'] = $this->criptografarUrl(uniqid());
        }
    }

    // função responsavel pela verficação do token
    public function verficarToken($valor) {


        if ($valor != $_SESSION['sie_evento']) {
            echo '<h1> <strong>  OPS: ACESSO NEGADO......403 </strong></h1>';


            exit;
        }
    }

// função que vai retorna o token que estara nos formulario
    public function retornaToken() {

        return '<input type="hidden" name="sie_sofil"  value="' . $_SESSION['sie_evento'] . '">';

    }

    public function destroyToken() {
        unset($_SESSION['sie_evento']);
    }

    /**
     * função responsavel pela criação de session do usuario
     * @param Estudante $dados
     */
    public function criarSession($dados) {

        if ((!isset($_SESSION['login'])) && (!isset($_SESSION['sie_dono']))):
            session_destroy();
            session_start();
            $httponly = true;

     
            $_SESSION['login'] = $dados;
            $_SESSION['sie_dono']=  $this->criptografarUrl('sie'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
            session_regenerate_id(TRUE);
             setcookie( session_name(), session_id(), null, '/', null, null, $httponly );
//                  setcookie("rememberUserManager", $_SESSION[$this->Session]['user_id'] . '@' . base64_encode("trioblack"), time() + (86400 * 30));
//            setcookie ("login", serialize ($_SESSION['login']), time() + 31536000, "/");
              
        endif;
    }

    public function retornaSsession(){

    return   $_isma= $this->criptografarUrl('sie'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

    }
    /**
     *  função que vai verficar se exite uma session de um usuario
     * @return boolean
     */
    public function verficaSesssion($dono) {
        $login=$_SESSION['login'];

        if (!isset( $login->sobrenome) || !isset($_SESSION['sie_dono']) ):
           header("Location:" .LOGIN);
            exit;

           endif;

         if($_SESSION['sie_dono']!=$dono):
            header("Location:" .LOGIN);
            exit;
        endif;

    }


    /*
     * função responsavel pra destroir a sesção do usario
     */

    public function destroiSession() {

        unset($_SESSION['idUser']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        unset($_SESSION['nivel']);
        unset($_SESSION['login']);
        //session_destroy();
    }

    /**
     * função que vai validar o email
     * @param type $email
     * @return boolean
     */
    function ValidarEmail($email)
       {
	if (!preg_match("/^[A-Za-z0-9]+([_.-][A-Za-z0-9]+)*@[A-Za-z0-9]+([_.-][A-Za-z0-9]+)*\\.[A-Za-z0-9]{2,4}$/", $email)) {
            return false;
        }
        else {
            return true;
        }
    }
    /**
     * função que vai criptografar as senhas de usuario
     * @param type $critpo
     */
    public function criptografarSenha($critpo) {
        /**
         *  uma descrição pra cada função usada

          md5($critpo); o seu tamanho é de 32 caracteres
          sha1($critpo); o seu tamanho é de 40 caracteres
          hash('sha256', $critpo); o seu tamanho é de 64 caracteres
          hash('sha384', $critpo); o seu tamanho é de 96 caracteres
          hash('sha512', $critpo); o seu tamanho é de 128 caracteres
          hash('whirlpool', $critpo); o seu tamanho tambem é de 128 caracteres
         */
        $segredo = hash('whirlpool', hash('sha512', hash('sha384', hash('sha256', sha1(md5($critpo))))));

        return $segredo;
    }

    /**
     * metodo que vai criptografar a Url na hora de navegação
     * @param type $critpo
     * @return $url
     */
    public function criptografarUrl($critpo) {
        /**
         *  uma descrição pra cada função usada
          md5($critpo); o seu tamanho é de 32 caracteres
          sha1($critpo); o seu tamanho é de 40 caracteres
          hash('sha256', $critpo); o seu tamanho é de 64 caracteres
         */
        $url = hash('sha256', sha1(md5('levi')));

        return $url;
    }

    /**
     * metodo responsavel pela validação dos carcterers
     * @param type $vgt
     * @return type
     */
    public function validarCaracter($vgt) {
        $limpa = array(0 => "'", 1 => '"', 2 => '(', 3 => ')', 4 => '=', 5 => ';', 6 => '/', 7 => '-');


        $sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|update|drop table|show tables|#|\*|--|\\\\)/"), "", $vgt);
        foreach ($limpa as $key => $value) {
            $fil = $limpa[$key];
            $sql = str_replace($fil, "", $sql);
        }
        $sql = trim($sql);
        $sql = strip_tags($sql);
        $sql = (get_magic_quotes_gpc()) ? addslashes($sql) : $sql;
        $sql = htmlentities($sql);
        // $sql = htmlentities($sql);
        return $sql;
    }

    /*
     * função pra verficar  se o usurio a fazer o login o ao cadastra, se a sua senha e igual a que esta dentro deste array
     */

    public function codigoMalicioso($senha, $email = '') {

        $senha = strtolower(trim($senha));
        $securty = array("admin'--", "'or 0=0 --", '" or 0=0 --', 'or 0=0 --', "'or 0=0 #", '"or 0=0 #', 'or 0=0 #', "'or 'x'='x", '"or "x"="x', "') or ('x'='x",
            "' or 1=1--", '" or 1=1--', 'or 1=1--', "' or a=a--", '" or "a"="a', "') or ('a'='a", '") or ("a"="a', 'hi" or "a"="a', 'hi" or 1=1 --', "hi' or 1=1 --",
            "hi' or 'a'='a", "hi') or ('a'='a", 'hi") or ("a"="a','"',"'",'--','#');

              
        
       if (!empty($senha) && !empty($email)):

            if (in_array($senha, $securty)):

                $ips = $_SERVER['REMOTE_ADDR'];
                $agente = $_SERVER['HTTP_USER_AGENT'];

                echo '<p> <h1> ** Se o usario voltar a fazer isso a Sua conta vai ser cancelada pra sempre   **</h1></P>';

                echo '<p> <a href="/app_sie_unificado_2016/"> Faça Login correcto </a></p>';
                
                // chamada do metodo que vai fazer o select pra contar o numero de tentativas que o usuario fez
                $contarTentativas = $this->contarTentativas($email);
                
                  if( $contarTentativas):
                      
                      $this->registros($email, $ips, $agente);
                  echo '<p> <h1> ** A sua conta esta cancelada temporariamente por motivos suspeita **</h1></P>';
                     echo '<p> <a href="/app_sie_unificado_2016/"> login </a></p>';
                    exit;
                    
                     else:
                       $this->registros($email, $ips, $agente);
                      
                  endif;
                
               
            endif;


        endif;
        if (!empty($senha) && $email == ''):

            if (in_array($senha, $securty)):
                echo "<script> console.log('Atensao os daodos  nao é valido pra cadastro');</script>";

                header("Location:" . URL);
                exit;
            endif;


        endif;
    }

    function sec_session_start() {
        $session_name = 'sec_session_id';

        $secure = SECURE;

        $httponly = TRUE;
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

        session_name($session_name); // recupera a ssesion
        session_start();
        session_regenerate_id(); // recupera a session e deletar a anterior
    }
    /**
     * função que vai registar os logues de login quando o utilizador logar no sistema
     * @param type $email
     */
      public function  logs($email){
          $ip=$_SERVER['REMOTE_ADDR'];
          $data=  date("d/m/Y "." H:i:s");
          
          if($file= fopen("./logs_login.txt","a+")){
              fputs($file," o utilizador{ " .$email. " } logo no sistema com ip {" .$ip. "} logo no dia {" .$data. "}\n");
          }  else {
             $file=  fopen("./logs_login.txt","a+");
             
          }
          fclose($file);
          
      }
      
    /**
     * função que vai registar no banco,, as tenatativas que usuario tento invadir o sistema
     * @param type $email
     * @param type $ip
     * @param type $navegador
     * @return type
     */
    public function registros($email, $ip, $navegador) {
        try {
            $dataActual = date('Y-m-d');
            $data=date('Y');
            $data=$data+3;
            $mx=date('m-d');
            $dataFim=$data.'-'.$mx;
            $hora = date('H:i:s');
            $cnx = Conexao::chamaConexao();

            $result = $cnx->prepare('INSERT INTO contaBarrada (email, ip_maquina, navegador, dataActual, dataFim, hora) VALUES (:email, :ip_maquina, :navegador, :dataActual, :dataFim, :hora);');
            $result->bindValue(':email', $email);
            $result->bindValue(':ip_maquina', $ip);
            $result->bindValue(':navegador', $navegador);
            $result->bindValue(':data', $dataActual);
            $result->bindValue(':dataFim', $dataFim);
            $result->bindValue(':hora', $hora);
            $retorno = $result->execute();
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
    
    
     /**
    *Função que vai contar as tentativas
    * @param type $id
    */ 
 public function contarTentativas($email) {
     
       try{
           
        parent::setCampos('email, ip_maquina, count(*) as Quantidade');
         parent::setTabela('contaBarrada');
         parent::setValorPesquisa('email =(:email)');
         $selecionaMaisCampos = parent::selecionaMaisCampos(); 
            $selecionaMaisCampos->bindParam(':email',$email, PDO::PARAM_STR);
            $selecionaMaisCampos->execute();
        
             $emia=$selecionaMaisCampos->fetch(PDO::FETCH_OBJ);
       
             if($emia->Quantidade==0):
                 return FALSE;
             endif;
              if($emia->Quantidade > 2):
                 return TRUE;
             endif;
             
            unset($selecionaMaisCampos);
         
      
       } catch (Exception $exc) {
        return $exc->getMessage();
       }   
    
 } 
    /**
     * função que vai controlar quem esta logado na aplicação
     */
    public function getLogado() {
        return $this->logado;
    }

    public function setLogado($logado) {
        array_push($this->logado , $logado);
    }


}
