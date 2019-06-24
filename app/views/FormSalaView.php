
<!DOCTYPE html>

<html lang="pt">
    
    <head>
        
        <title> <?php echo "Administrador  sie";?> </title>
    </head>

    <body>
         <?php
        
           include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
           include "barra_lateral_admin.php";
            
       
        ?>
        <section id="container" class="">
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Registar Sala
                                </header>
                                <div class="panel-body">
                                    <div class="form">



                                        <form role="form" class=" cmxform form-horizontal" id="form" method="POST" action="<?php echo META_URL;?>Sala_/validarDados/" >

                                            <div class="form-group">

                                                <p>&nbsp;</p> <!-- contact-form-contact-form-->


                                                <div class="form-group">
                                                    <label for="numero" class="control-label col-lg-13">N&uacute;mero da Sala <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="numero" name="numero" type="text" class="caracteres1 form-control" maxlength="40">

                                                    </div>
                                                </div>

                                                
                                                

                                                <div class="form-group">
                                                    <label for="capacidade" class="control-label col-lg-13">Capacidade <span class="required">*</span> </label>
                                                    <div class=" col-lg-10">
                                                        <input id="capacidade" maxlength="6" name="capacidade" type="text" min="1" class="capacidade form-control"tabindex="10"   >
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <?php  echo $securty->retornaToken();?>
                                                    <label for="codigo" class="control-label col-lg-13"></label>
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button  type="submit" value="inserir" class="btn btn-primary" name="opcao"><span class="glyphicon"></span> Registar</button>
                                                        <button class="btn btn-default" type="button">Cancelar</button>
                                                    </div>
                                                </div>                 
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
        </section>
      

           

        
       
    </body>
</html>                                

