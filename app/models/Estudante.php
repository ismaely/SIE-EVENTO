<?php


 class Estudante extends Utilizador {
    
     private $id_Estudante;
     private $numero;
     private $curso;
     
    function __construct() {
      
    }
    function getNumero() {
         return $this->numero;
     }
     function getCurso() {
         return $this->curso;
     }
     function getId_Estudante() {
         return $this->id_Estudante;
     }
     function setId_Estudante($id_Estudante) {
         $this->id_Estudante = $id_Estudante;
     }

     function setNumero($numero) {
         $this->numero = $numero;
     }

     function setCurso($curso) {
         $this->curso = $curso;
     }
     
     /****Os get e set que fo herdado do utilizador ***/
     
     public function getDataNascimento() {
         parent::_getDataNascimento();
     }
     public function getEmail() {
         parent::_getEmail();
     }
     public function getFoto() {
         parent::_getFoto();
     }
     public function getIdUlizador() {
         parent::_getIdUlizador();
     }
     public function getGenero() {
         parent::_getGenero();
     }
     public function getSobrenome() {
         parent::_getSobrenome();
     }
     
     public function getSenha() {
         parent::_getSenha();
     }
     public function getNome() {
         parent::_getNome();
     }
     public function getTelefone() {
         parent::_getTelefone();
     }
     
     public function setDataNascimento($dataNascimento) {
         parent::setDataNascimento($dataNascimento);
     }
     
     public function setEmail($email) {
         parent::setEmail($email);
     }
     public function setFoto($foto) {
         parent::setFoto($foto);
     }
     public function setGenero($genero) {
         parent::setGenero($genero);
     }
     public function setIdUlizador($idUlizador) {
         parent::setIdUlizador($idUlizador);
     }
     public function setNome($nome) {
         parent::setNome($nome);
     }
     public function setSobrenome($sobrenome) {
         parent::setSobrenome($sobrenome);
     }
     public function setTelefone($telefone) {
         parent::setTelefone($telefone);
     }
     
     public function setSenha($senha) {
         parent::setSenha($senha);
     }
     

    
    
}
