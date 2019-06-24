<?php



/**
 * Description of Rederizar
 *
 * @author ismael_7il
 */
class Rederizar {
   
    public static function redirecionar(){
        $nivel= $_SESSION['login']; 
 
       if($nivel->nivel==NIVEL_ESTUDANTE):
            
           Rotas_::perfilEstudante();
            
        endif;  
        if( $nivel->nivel==NIVEL_DOCENTE):
            
            Rotas_::perfilDocente();
            
        endif;  
        
        if($nivel->nivel==NIVEL_ADMIN):
            
            Rotas_::perfilAdmin();

            
        endif;  
        
       
        
    }
    
}
