<?php



/**
 * Description of Sala_Cntl
 *
 * @author ismael_7il
 */
class Sala_ {
   
    
    
    function validarDados(){
        
         $sal = new Sala;
         $sala = new SalaDao;
         $securty = new SegurancaDao;
         
         $securty->verficarToken($_POST['sie_sofil']);
        
          $numero = $_POST['numero'];
          $capacidade = $_POST['capacidade'];
         
         $sal->setNumero($numero);
         $sal->setCapacidade($capacidade);
         
           if($sala->registarSala($sal)):
             
               Admin_::perfilAdmin();
         endif;
          
          
          
    }
    
    
}
