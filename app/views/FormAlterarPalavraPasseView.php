
<!DOCTYPE html>

<html lang="pt">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

       
    </head>

    <body class="home page no_js responsive stretched">
      <?php
     
          $titulo="Alterar Password";
           
           include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
            $securty->criarToken();
            // $login= $_SESSION['login'];
             
              
              if($login->nivel==NIVEL_ESTUDANTE)
              include "barra_lateral_estudante.php";
             
              
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
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Alterar Palavra Pass
                                  
                                </header>
                                <div class="panel-body">
                                    <div class="form">



                                        <form role="form" class=" cmxform form-horizontal" id="form" method="POST" action="<?php echo META_URL;?>Utilizadore_/validarPassword/" >

                                            <div class="form-group">

                                                <p>&nbsp;</p> <!-- contact-form-contact-form-->
                                                 <div class="form-group">
                                                    <label for="novasenha" class="control-label col-lg-13">Senha Antiga<span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="senhaantiga" name="senhaantiga" type="password" class=" senhaantiga form-control" maxlength="16" >
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>

  
                                                <div class="form-group">
                                                    <label for="novasenha" class="control-label col-lg-13">Nova Senha <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="novasenha" name="novasenha" type="password" class=" novasenha senha form-control" maxlength="16">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="confirm_password" class="control-label col-lg-13">Confirmar a Nova Senha <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <input id="confirm_password" name="confirmarsenha" type="password" class=" confirmasenha form-control" >
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                                      <?php  echo $securty->retornaToken();?>
                                                <div class="form-group">
                                                    <label for="codigo" class="control-label col-lg-2"></label>
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button  type="submit" value="inserir" class="btn btn-primary" name="opcao"><span class="glyphicon"></span>Alterar</button>
                                                        <button class="btn btn-default" type="reset">Cancelar</button>
                                                    </div>
                                                </div>                 
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                   
                </section>
            </section>
            
            
            
            
            <style>
            .block {
                display: block;
            }
            form.cmxform label.error {
                display: none;
                color: red;
            }

            #errado {

                color: red;
            }

            .novasenha, .confirmasenha,.senhaantiga {

                width: 40%;
            }
        </style>
 
            <!--main content end-->
        </section>
        <!-- container section end -->

        <!-- javascripts -->

    </body>
</html>                                

