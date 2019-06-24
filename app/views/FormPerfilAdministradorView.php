<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> <?php echo"Administrador do Sistema";?></title>
    </head>
    <body>
        <?php
        
       
          
           include "cabecalho.php";
           
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
            
              $securty->criarToken();
           include "barra_lateral_admin.php";
            
          
        ?>
        <br/>
        <section id="container" class="">

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">

                    </div>
                       
                                                  <div class="form-admin">
                                                   
                                                    <div class="col-lg-13">

                                                         <h1>  
                      
                                                     ADMIN-  S I E -2016      <?php echo ''.Mensagem::getSucesso();?>
                                                       </h1>

                                                    </div>
                                                </div>
                    
                   
                        
                </section>
            </section>
            <!--main content end-->
        </section>
    <!-- container section end -->

    </body>
</html>
