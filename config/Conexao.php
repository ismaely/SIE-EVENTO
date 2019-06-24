
<?php

  class Conexao {
      
      
    private static $Host = HOST;
    private static $User = USER;
    private static $Pass = PASS;
    private static $Dbsa = DBSA;

    
      private static $instance=null;
    
    private static function conectar(){
        
        try {
            if(self::$instance==NULL):
                
                $dsn = 'mysql:host=' . self::$Host . ';dbname=' . self::$Dbsa;
                $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
                self::$instance=new PDO($dsn, self::$User ,  self::$Pass, $options);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
            endif;
            
            
        } catch (PDOException $exc) {
            echo "erro". $exc->getTrace();
        }
        
        return self::$instance;
          
    }
    public static function chamaConexao(){
        return self::conectar();
    }
  
}

