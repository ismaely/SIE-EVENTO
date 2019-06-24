<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BasePadraoSql
 *
 * @author ismael_7il
 */
class BasePadraoSql extends Conexao{
   
                protected $sql;
		protected $tabela;
		protected $campos;
		protected $dados;
		protected $msg;
		protected $valorNaTabela;
		protected $valorPesquisa;
                protected static $id;


                
                static function getId() {
                    return self::$id;
                }

                static function setId($id) {
                    self::$id = $id;
                }

                 public function getSql()
		{
			return $this->sql;
		}
		public function setTabela($tbl)
		{
			$this->tabela = $tbl;
		}		
		public function setCampos($campo)
		{
			$this->campos = $campo;
		}		
		public function setDados($dado)
		{
			$this->dados = $dado;
		}
		public function getMsg()
		{
			return $this->msg;
		}
		public function setValorNaTabela($val)
		{
			$this->valorNaTabela = $val;
		}
		public function setValorPesquisa($pesq)
		{
			$this->valorPesquisa = $pesq;
		}
		    
                /**
                 * função que vai retorna o insert
                 * @return type
                 */
               public function inserir()
		      {  
                       $cnx=  Conexao::chamaConexao();
			$this->sql = "INSERT INTO $this->tabela ($this->campos) VALUES ($this->dados);";
			 $insert=$cnx->prepare($this->sql);
		         $this->setId($cnx);
                         return $insert;        
                         }
                 
                /**
                 * função que pode ser usada quando se tens mais condiçoes pra se eliminar um campo
                 * @return type
                 */
                public function excluir()
		{       $cnx=  Conexao::chamaConexao();
			$this->sql = "DELETE FROM $this->tabela WHERE $this->valorPesquisa;";
			
                        $excluirMais=$cnx->prepare($this->sql);
			return $excluirMais;	
					
		}
                /**
                 * função que vai retorna a query pra alterar para um campos apenas.. que ja tem parentes
                 * @return type
                 */
            
                public function alterar()
		   {  $cnx=  Conexao::chamaConexao();
		      $this->sql = "UPDATE $this->tabela SET $this->campos WHERE $this->valorPesquisa ;";
					
		      $alterarMais=$cnx->prepare($this->sql);
                      $this->setId($cnx);
                      return $alterarMais;
		} 
                /**
                 * função que vai retorna a query pra seleciona todos campos desejado
                 * @return type
                 */
                
                public function selecionaTudo(){
                    
                   $cnx=  Conexao::chamaConexao();
                   $this->sql="SELECT * FROM $this->tabela ;";
                   $selecionaTudo=$cnx->prepare($this->sql);
                   
                   return $selecionaTudo;
                }
                 /**
                 * função que vai selecionar todos campos da tabela e com uma condição
                 * @return type
                 */
                public function selecionaTudo_ComCondicao(){
                    
                   $cnx=  Conexao::chamaConexao();
                   $this->sql="SELECT * FROM $this->tabela WHERE $this->valorPesquisa ;";
                   $selecionaTudo=$cnx->prepare($this->sql);
                   
                   return $selecionaTudo;
                }
                
                /**
                 * função que vai selecionar alguns campos sem passar parametro de condição
                 * @return type
                 */
                public function selecionaCompo_SemCondicao(){
                    
                   $cnx=  Conexao::chamaConexao();
                   $this->sql="SELECT $this->campos FROM $this->tabela ;";
                   $seleciona=$cnx->prepare($this->sql);
                   
                   return $seleciona;
                }
               
                 
                /**
                 * função que vai retornar a query que seleciona mais campo
                 * @return type
                 */
                public function selecionaMaisCampos(){
                    
                   $cnx=  Conexao::chamaConexao();
                   $this->sql="SELECT $this->campos FROM $this->tabela WHERE $this->valorPesquisa ;";
                   $selecionaMaisCampos=$cnx->prepare($this->sql);
                   
                   return  $selecionaMaisCampos;
                } 
    
    
    
}
