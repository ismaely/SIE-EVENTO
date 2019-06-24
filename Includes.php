<?php
      
 // a que estamos a fazer a inclusao do ficheiro q esta na pasta system cesso
require_once(dirname(__FILE__) . '/system/RotaErro.php');
require_once(dirname(__FILE__) . '/system/Define.php');
require_once(dirname(__FILE__) . '/config/Conexao.php');
require_once(dirname(__FILE__) . '/system/ControllerChamada.php');
require_once(dirname(__FILE__) . '/system/System.php');
//require_once(dirname(__FILE__).'/system/Pequisa.php');
require_once(CONTROLLERS . 'Evento_Cntl.php');
require_once(CONTROLLERS . 'Rotas_Cntl.php');

/**
 *  a que é onde esta ser feito o require_once de cada ficheiro que esta dentro da pasta app,.. com metodo _autoload que se
 * encarregar de fazer isso automatico
 * @param type $classe
 */
function __autoload($classe) {

    if (file_exists("app/models/{$classe}.php")) {
        require_once"app/models/{$classe}.php";
    }
    elseif (file_exists("app/dao/{$classe}.php")) {
        require_once"app/dao/{$classe}.php";
    } 
    elseif (file_exists("app/controllers/{$classe}.php")) {
        require_once"app/controllers/{$classe}.php";
    }
    elseif (file_exists("app/seguranca/{$classe}.php")) {
        require_once"app/seguranca/{$classe}.php";
    }
}
