<?php


/**
 * 
 * Description of Mensagem: CLASSE RESPONSAVEL PELAS MENASSAGEM NO SISTEMA 
 *
 * @author ismael_7il
 */
class Mensagem {
  
    private static $sucesso;
    private static $erro;
    
    function __construct() {
        
    }

    
    static function getSucesso() {
        return self::$sucesso;
    }

    static function getErro() {
        return self::$erro;
    }

    static function setSucesso($sucesso) {
        self::$sucesso = $sucesso;
    }

    static function setErro($erro) {
        self::$erro = $erro;
    }


    
    
    
    
    
}
