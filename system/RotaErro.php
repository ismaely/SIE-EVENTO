<?php


class RotaErro{
    
    protected function rota($url){
       // echo "erro nada encontrado".$url;
        // VERFICADO SE O ARQUIVO QUE ESTA NA PASTA PUBLIC EXISTE
        
        $url =($url == 'Index' ? 'Index.php' : $url);
             if(file_exists(PUBLIC_PHP.$url)){ 
           
            require_once (PUBLIC_PHP.$url); 
        } 
        else {
             echo '<h1> <strong> OPS: ROTA NÃO ENCONTRADO....ERRO 404 </strong> </h1>';
          
        }
     
    }
}