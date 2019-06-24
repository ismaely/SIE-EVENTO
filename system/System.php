<?php

// classe responsavel pra manipular o controller pra chamar as views e model
class System extends RotaErro{

/**  declaração das variaveis que seram usadas */
 private $_url;
 private $_explode;
 private $_controller;
 private $_action;
 private $_dados;
 private $_chave;

 /*
 *
 * construtor para incializar as variaveis privada
 */

 function __construct() {
     $this->set_url();
     $this->set_explode();
     $this->set_controller();
     $this->set_action();
     $this->set_dados();

 }
 /** função que vai a receber a url principal  vai ser passada na variavel url */
  private function set_url() {
   $this->_url=(empty($_GET['url']) ? 'Rotas_/' : $_GET['url']);
  }

 /** funçaõ que vai dividir a url por uma /e vai ser passadana variavel _explode como array */
  private function set_explode() {
   $this->_explode = explode('/', $this->_url);

 }

 /** função que vai receber o controller ou que esta na posição [0].... pois o controller é o nome da classe */
  private function set_controller() {

  $menos= $this->_controller = strtolower($this->_explode[0]) ; // colocando o controller em maiuscula
  // colocado a a primeira letra maiuscula do controller
  $this->_controller =strtoupper(substr($menos, 0, 1)) . substr($menos, 1);
   unset($this->_explode[0]);
 }
 /** A que é onde vai ser recebido a acção ou seja o metodo que esta dentro do controllers [1] */
  private function set_action() {
  $this->_action = (empty($this->_explode[1]) ? 'index' : $this->_explode[1]);
   // podo tudo menuscula
  $this->_action= strtolower($this->_action);


 }
 /*  função que vai receber os dados da url quando o usario passar... e a chave em forma de array */
 private function set_dados(){
   $this->_dados= (empty($this->_explode[2])? '': $this->_explode[2]);
   $dados=explode('=', $this->_dados);
   $this->_dados=(isset($dados[1])?$dados[1]:0);
    $this->_chave=(isset($dados[0])?$dados[0]:0);
 }
 /* função que vai retorna os dados */
 public function get_dados(){
     return $this->_dados;
 }

 /**
  * função que esta retorna a chave
  */
  public function get_chave(){
      return $this->_chave;
 }

 // a que é onde vamos chamaras os nossos controller
 public function run(){
   //  echo 'controller  '.$this->_controller;
    // echo 'acao  '.$this->_action;
    //
     // verficando se o aqrquivo existe no direitorio
      if(file_exists(CONTROLLERS.$this->_controller.'Cntl.php')){
           session_start();
          //  $_SESSION['Usuario'];

          require_once(CONTROLLERS.$this->_controller.'Cntl.php');

          // se a classe exite que deseja no controller q é acessado
          if(class_exists($this->_controller)){

              // estanciado  o controller q é a classe
              $controller = new $this->_controller();
              // passado o dados da _action pra acao que na realiade é o metodo q se deseja
              $acao = $this->_action;

        // verficar se o metodo existe o que se pretende que esta dentro do controllers,  onde o nosso metodo vai chamar a views ou seja o formulario
              if(method_exists($controller, $acao)){

                  $controller->$acao();

               }  else {
                  // a que é onde vai ser tratado o erro, onde vai poder muda de rotas
                  parent::rota($this->_url);
              }
            }
          else {
               // a que é onde vai ser tratado o erro, onde vai poder muda de rotas
            parent::rota($this->_url);
          }

         }
     else {
        // a que é onde vai ser tratado o erro, onde vai poder muda de rotas
         parent::rota($this->_url);
      }

	//echo 'controller: ' .$this->_controller. ' ação ' .$this->_action;

}


}
