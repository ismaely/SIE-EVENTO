<?php
/* 
 * OBS : FALTA TRATAR AS QUESTOES DE COMPOSIÇÃO E AGREGAÇÃO 
 */
class Evento {
    
    
    private $idEvento;
    private $nome;
    private $descricao;
    private $estado;
    private $dataLimiteInscricao;
    private $horaLimiteInscricao;
    private $dataRealiz;
    private $hora_inicioRealiz;
    private $hora_fimRealiz;
    private $ambito;
    private $dataCriacao;
    private $id_Sala;
    private $anexo;
    private $categoria;
        
    
    function getCategoria() {
        return $this->categoria;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

        function getAnexo() {
        return $this->anexo;
    }

    function setAnexo($anexo) {
        $this->anexo = $anexo;
    }

        
    function getDataRealiz() {
        return $this->dataRealiz;
    }

    function setDataRealiz($dataRealiz) {
        $this->dataRealiz = $dataRealiz;
    }

    function getIdEvento() {
        return $this->idEvento;
    }
  
    
    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getEstado() {
        return $this->estado;
    }

    function getDataLimiteInscricao() {
        return $this->dataLimiteInscricao;
    }

    function getHoraLimiteInscricao() {
        return $this->horaLimiteInscricao;
    }

    function getHora_inicioRealiz() {
        return $this->hora_inicioRealiz;
    }

    function getHora_fimRealiz() {
        return $this->hora_fimRealiz;
    }

    function getAmbito() {
        return $this->ambito;
    }

    function getDataCriacao() {
        return $this->dataCriacao;
    }

    function getId_Sala() {
        return $this->id_Sala;
    }

    function setIdEvento($idEvento) {
        $this->idEvento = $idEvento;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setDataLimiteInscricao($dataLimiteInscricao) {
        $this->dataLimiteInscricao = $dataLimiteInscricao;
    }

    function setHoraLimiteInscricao($horaLimiteInscricao) {
        $this->horaLimiteInscricao = $horaLimiteInscricao;
    }

    function setHora_inicioRealiz($hora_inicioRealiz) {
        $this->hora_inicioRealiz = $hora_inicioRealiz;
    }

    function setHora_fimRealiz($hora_fimRealiz) {
        $this->hora_fimRealiz = $hora_fimRealiz;
    }

    function setAmbito($ambito) {
        $this->ambito = $ambito;
    }

    function setDataCriacao($dataCriacao) {
        $this->dataCriacao = $dataCriacao;
    }

    function setId_Sala($id_Sala) {
        $this->id_Sala = $id_Sala;
    }


     
  


}
