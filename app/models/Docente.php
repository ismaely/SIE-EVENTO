<?php

class Docente extends Utilizador {

    private $id_Docente;
    private $grauAcademico;
    private $especialidade;

    function getEspecialidade() {
        return $this->especialidade;
    }

    function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }

    function getId_Docente() {
        return $this->id_Docente;
    }

    function setId_Docente($id_Docente) {
        $this->id_Docente = $id_Docente;
    }

    function getGrauAcademico() {
        return $this->grauAcademico;
    }

    function setGrauAcademico($grauAcademico) {
        $this->grauAcademico = $grauAcademico;
    }

    /** herdada da classe Utilizador  * */
    public function getDataNascimento() {
        return parent::_getDataNascimento();
    }

    public function getEmail() {
        return parent::_getEmail();
    }

    public function getFoto() {
        return parent::_getFoto();
    }

    public function getGenero() {
        return parent::_getGenero();
    }

    public function getIdUlizador() {
        return parent::_getIdUlizador();
    }

    public function getNome() {
        return parent::_getNome();
    }

    public function getSenha() {
        return parent::_getSenha();
    }

    public function getSobrenome() {
        return parent::_getSobrenome();
    }

    public function getTelefone() {
        return parent::_getTelefone();
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

    public function setSenha($senha) {
        parent::setSenha($senha);
    }

    public function setSobrenome($sobrenome) {
        parent::setSobrenome($sobrenome);
    }

    public function setTelefone($telefone) {
        parent::setTelefone($telefone);
    }

}
