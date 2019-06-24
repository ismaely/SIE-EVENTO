


<?php

//CONSTANTES DA BASE DE DADOS
define("HOST", '127.0.0.1'); // 192.168.1.101
define("DBSA", 'sie');  // NOME DA BASE DE DADOS
define("USER", 'sie_2016');  //sie_2016      // NOME DO USARIO DA BASE DE DADOS
define("PASS", '2ies016'); //2ies016        //  PALAVRA PASSE DO usuario

/* CONSTANTES QUE VAI REDIRECIONAR OS DADOS PRA O CONTROLLER PRA SER VALIDADOS E INSERIDO*/
define("SIE", "192.168.1.100"); 
define("URL", SIE."/app_sie_unificado_2016/");  //http://localhost/app_sie_unificado_2016/
//define("URL", "/app_sie_unificado_2016/");
define("META_URL", "/app_sie_unificado_2016/");
define("CHAMAR_ESTUDANTE", "/app_sie_unificado_2016/Rotas_/formRegistaEstudante");
define("LOGIN", "/app_sie_unificado_2016/Rotas_/autenticar");

/* mensagem pra usuario*/
define("ERRO", 'ops: verifica os seus Dados ');
define("SUCESSO", 'cadastrado com sucesso... seja bem vindo');
define("INTRUSO", 'usuario foi detetado.. a invadir o sistema');

/* constantes de nivel, desponibilidade e estados*/
define("NIVEL_ESTUDANTE", 1);
define("NIVEL_DOCENTE", 2);
define("NIVEL_ADMIN", 3);
define("NIVEL_ALARME", 10);

define("PREVILEGIO_UM", 1);
define("PREVILEGIO_DOIS", 2);

 /*  */
define("DISPONIBILIDADE_SIM", 'sim');
define("DISPONIBILIDADE_NAO", 'nao');

/**  */
define("CRIADO", 'criado mas ainda nao aberto a inscrições');
define("AGUARDAR", 'aguardar inscricões');
define("INSCRICOES", 'inscricoes fechada masis com data da realização ainda pra definir');
define("CONCLUIDO", 'concluido com data e hora da realização pra definir');


// constante para acesso do direitorio
define('APP', dirname(__FILE__).'/../app/');
define('CONTROLLERS', APP.'controllers/');
define('MODELS', APP.'models/');
define('VIEWS', APP.'views/');
define('DAO', APP.'dao/');
define('PUBLIC_PHP', dirname(__FILE__).'/../public/');
define('UPLOAD_PASTA','./arquivos/');
define('TAMANHO',609024);
