
<!DOCTYPE html>

<html lang="pt">
    
    <head>
        
        <title> <?php echo "Alterar Estado do Evento";?> </title>
    </head>

    <body>
         <?php
        
           include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
               $securty->criarToken();
            include "barra_lateral_docente.php";
            
       
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
                                    Alterar Estado do Evento
                                </header>
                                <div class="panel-body">
                                    <div class="form">



                                        <form role="form" class=" cmxform form-horizontal" id="form" method="POST" action="<?php echo META_URL;?>Evento_/alterarEstado/" >

                                            <div class="form-group">

                                                <p>&nbsp;</p> <!-- contact-form-contact-form-->


                                                <div class="form-group">
                                                    <label for="estado" class="control-label col-lg-13">Estado <span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        <select id="estado" name="estado" class="form-control">
                                                            <option value="">Seleccione o estado</option>
                                                            <option value="1">Criado Mais ainda n&atilde;o aberto a Inscri&ccedil;&otilde;es</option>
                                                            <option value="2">Aguardando Inscri&ccedil;&otilde;es</option>
                                                            <option value="3">Conclu&iacute;do</option>
                                                            <option value="4">Inscri&ccedil;&otilde;es Fechadas</option>
                                                      
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                        <div class="form-group">
                                                <label for="email" class="control-label col-lg-13"> </span> </label>
                                              <input type="hidden" name="id" value="<?php echo $system->get_dados();?>"/>
                                                <div class="col-lg-10">

                                                </div>
                                            </div>
                                                
                                                <div class="form-group">
                                                     <?php  echo $securty->retornaToken();?>
                                                    <label for="codigo" class="control-label col-lg-13"></label>
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button  type="submit" value="inserir" class="btn btn-primary" name="opcao"><span class="glyphicon"></span> Alterar</button>
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

