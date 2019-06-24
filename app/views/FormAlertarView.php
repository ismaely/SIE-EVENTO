
<!DOCTYPE html>

 <html lang="pt">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

        <title> informação pertinete</title>
        
    </head>
    
    <body class="home page no_js responsive stretched">
      <?php
     
          $titulo="Alterar Password";
           
          include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
            $securty->criarToken();
             $login= $_SESSION['login'];
             
              
              
               if($login->nivel==NIVEL_DOCENTE)
               include "barra_lateral_docente.php";
              
               if($login->nivel==NIVEL_ADMIN)
              include "barra_lateral_admin.php";
        ?>
       
        <!-- container section start -->
        <section id="container" class="">
            <!--header start-->
           
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">

                    </div>

                    <div class="row">
                        <div class="col-xs-11">
                            <section class="panel">
                                <header class="panel-heading">
                                   Informação pertinete
                                
                                </header>
<!--                                <div class="panel-body">-->
                                     <div class="messages"></div>
                                        <form role="form"  class="form_al" action="javascript:void(0)" >
                                                    
                                                   <label for="message">&gt;</label>
                                                   <input type="text" id="message" required autofocus />
                                               

                                        </form>
<!--                                    </div>-->
                 
                               <script src=".../web_sockets/ws-client.js"></script>
                                </div>  
                   
                            </section>
                        </div>
                    </div>
                   
                </section>
            </section>
          
            <!--main content end-->
        </section>
        <!-- container section end -->

        <!-- javascripts -->

    </body>
</html>                                

