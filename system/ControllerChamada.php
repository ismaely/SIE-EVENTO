<?php

// essa é controller pai que inclui as view qdo soa solicitada pela classe menuCntrl
 class ControllerChamada {
   
    // metodo q vai começar chamar as view atraves do comtroller
    protected function view($pagina='', $dados=null){
        
        if(empty($pagina)){
            echo '<h1>erro ops erro 505 cntl</h1>';
        }
        else {
           if(file_exists(VIEWS.$pagina.'View.php')){
             require_once(VIEWS.$pagina.'View.php');
              } 
              
              
              else {
           echo '<h1>erro ops:707 nda req  </h1>';
        }
         }
        
    }
    
}
