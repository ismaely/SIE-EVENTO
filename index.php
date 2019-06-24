
 <?php  
     
header('Content-Type: text/html; charset=utf-8');
error_reporting(1);
ini_set('display_errors', 1);  //ativando o php a mostra o erro
ini_set('log_erros', 1);
ini_set('error_log', dirname(__FILE__) . '/error_logs_novo.txt'); // cria um ficheiro de erro pra se

 //error_reporting(E_ALL);

//fazer o repote de todos erros
// error_reporting(E_ALL);
 require_once('Includes.php');
//estanciamento da classe do sistema que tem o arrque do projecto onde chama o index
$start = new System();
//chamada do metodo que executa o araque do controller 
$start->run();
?>

