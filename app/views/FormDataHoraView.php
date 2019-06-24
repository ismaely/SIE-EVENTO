
<!DOCTYPE html>

<html lang="pt">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

        <title> <?php echo 'Sie definir Data ';?></title>
    </head>
    </head>

    <body class="home page no_js responsive stretched">
      <?php
        
           
           include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
            $securty->criarToken();
            include "barra_lateral_docente.php";
           
             
         ;
        ?>
      
             <!-- fechar caso o nivel seja um vai mostra a barra lateral do estudante -->
           
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
                                    Definir data hora
                                 <?php 
//            
//                              $dataHora=$securty->criptografarUrl('dataHora');
//                              $vgt=  explode('=', $system->get_dados()); // fazer um explode nos dados que nos retorna da classe System 
//         
//                                 $chave=(isset($vgt[0])?$vgt[0]:0);
//                                $idEvento= (isset($vgt[1])?$vgt[1]:0);  
             
            
                                 ?>
            
                                </header>
                                <div class="panel-body">
                                    <div class="form">



                                        <form role="form" class=" cmxform form-horizontal" id="form" method="POST"  action="<?php echo META_URL;?>Evento_/registarDataHata/" >

                                            <div class="form-group">

                                                <p>&nbsp;</p> <!-- contact-form-contact-form-->



                                                <div class="form-group">
                                                    <label for="" class="control-label col-lg-2">Data de Realiza&ccedil;&atilde;o<span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                        
                                                      <select id="dataRealizacao" name="dataRealiz" class="form-control"  class="dataRealizacao form-control">
                                                            <option value="">Seleciona Data</option>
                                                            
                                                            <?php   
                                                                $definirdata = $DataHora->buscarDataHoraRealiza($system->get_dados());
                                                              while($row=$definirdata->fetch(PDO::FETCH_OBJ)){   
                                                                    ?>
                                                           <option value="<?php echo (isset($row->dataEstipulada)?$row->dataEstipulada:'Data indefinida' ); ?>"><?php echo (isset($row->dataEstipulada)?$row->dataEstipulada:'Data indefinida' ); ?> </option> 
                                                          
                                                           <?PHP  }?>
                                                          </select>
                                                           </div>
                                                            </div>
                                                
                                                
                                                <div class="form-group">
                                                    <label for="horaInicio" class="control-label col-lg-2">Hora de In&iacute;cio de Realiza&ccedil;&atilde;o<span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                       <select id="" name="hora_inicioRealiz" class="form-control" class=" validar form-control">
                                                            <option value="">Seleciona a hora</option>
                                                            
                                                            <?php   
                                                               $definirdata = $DataHora->buscarDataHoraRealiza($system->get_dados());
                                                               while($row=$definirdata->fetch(PDO::FETCH_OBJ)){   
                                                                    ?>
                                                           <option value="<?php echo (isset($row->horaInicio)?$row->horaInicio:' Hora indefinida' ); ?>"><?php echo (isset($row->horaInicio)?$row->horaInicio:' Hora indefinida' );  ?> </option> 
                                                          
                                                              <?PHP }?>
                                                           
                                                          </select>
                                                        
                                                    </div>
                                                </div>
                                                    
                                                
                                                <div class="form-group">
                                                    <label for="horaFim" class="control-label col-lg-2">Hora de Fim de Realiza&ccedil;&atilde;o<span class="required">*</span> </label>
                                                    <div class="col-lg-10">
                                                       <select id="" name="hora_fimRealiz" class="form-control" class=" validar horaFim form-control">
                                                            <option value="">Seleciona a hora</option>
                                                            
                                                            <?php   
                                                                $definirdat = $DataHora->buscarDataHoraRealiza($system->get_dados());
                                                              while($row= $definirdat->fetch(PDO::FETCH_OBJ)){   
                                                                    ?>
                                      <option id="horaFim" value="<?php echo (isset($row->horaFim)?$row->horaFim:' Hora indefinida' );?>"> <?php echo (isset($row->horaFim)?$row->horaFim:' Hora indefinida'); ?> </option> 
                                                          
                                                                     <?PHP }?>
                                                          </select>
                                                        
                                                    </div>
                                                     <input type="hidden" name="id" value="<?php echo $system->get_dados();?>"/>
                                                </div>
                                                
                                                
                                                    <?php  echo $securty->retornaToken();?>
                                                <div class="form-group">
                                                    <label for="codigo" class="control-label col-lg-2"></label>
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button  type="submit" value="" class="btn btn-primary" name=""><span class="glyphicon"></span>Enviar</button>
                                                        <button class="btn btn-default" type="reset">Cancelar</button>
                                                    </div>
                                                </div>                 
                                        </form>
                                    
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

            .novasenha, .confirmasenha {

                width: 40%;
            }
        </style>
 
            <!--main content end-->
        </section>
        <!-- container section end -->

        <!-- javascripts -->

    </body>
</html>                                

