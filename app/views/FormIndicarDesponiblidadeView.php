<!DOCTYPE html>


       
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo 'Indicar Desponiblidade';?></title>
    </head>
    <body>
       <?php
           
            
           include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
           $securty->criarToken(); 
           
           if ($login->nivel== NIVEL_ESTUDANTE) {
           include "barra_lateral_estudante.php";
           }


           if ($login->nivel == NIVEL_DOCENTE) {
         include "barra_lateral_docente.php";
           }
      ?>
        <br/>
       <div class="row" style="margin-left:155px; margin-top: 40px; ">
                  <div class="col-lg-12">
                      <section class="panel">
                        
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                               
                              <tr>
                                  <th>  <div class="col-lg-12"><i class="icon_group"></i> Nome Evento </div></th>
                          <th>  <div class="col-lg-12"><i class="icon_pin_alt"></i> Data Indicada </div></th>
                          <th>  <div class="col-lg-12"><i class="icon_pin_alt"></i> Hora de Incio </div> </th>
                          <th>  <div class="col-lg-12"><i class="icon_pin_alt"></i> Hora de Fim </div> </th>
                          <th>  <div class="col-lg-12"><i class=""></i>  </div> </th>
                                 </tr>
                              
                                   <?PHP  
                                     
                                      $guarda=  $inscricao->listarInscricoesIndarDesponiblidade($system->get_dados());
                                      
                                      $dados = $evento->buscarDados($system->get_dados());
                                        ?>
                                       
                                  <tr class="success">
                                  
                                   <form class="navbar-form" method="POST" action="<?php echo META_URL;?>Evento_/validarDisponiblidade/">
                                       
                                       
                                           <td><?php echo $dados->nomeEvento ; ?></td>
                                 
                                                   <td>  
                                                     <div class="form-group">
                                                    <div class="col-lg-12">
                                                        <select id="genero" name="data" class="genero form-control"> 
                                                            <?php  foreach ($guarda as $key => $value) { ?>
           <option value="<?php echo $guarda[$key]->dataEstipulada;?> "> <?php echo ( isset($guarda[$key]->dataEstipulada)?$guarda[$key]->dataEstipulada:'nao data' ); ?> </option>
                                                            <?php } ?>
           
                                                        </select>
                                                    </div>
                                                    </div>
                                                    
                                                 </td>
                                 
                                                 
                                                   <td>  
                                                     <div class="form-group">
                                                   <!-- <label for="genero" class="control-label col-lg-13">Seleciona a Data <span class="required">*</span> </label> -->

                                                    <div class="col-lg-12">
                                                        <select id="genero" name="horaInicio" class="genero form-control"> 
                                                             <?php  foreach ($guarda as $key => $value) { ?>
              <option value="<?php echo $guarda[$key]->	horaInicio;?> "> <?php echo ( isset($guarda[$key]->horaInicio)?$guarda[$key]->horaInicio:'nao hora de inicio' ); ?> </option>
                                                             <?php }?> 
                                                        </select>
                                                    </div>
                                                    </div>
                                                 </td>
                                                 <td>  
                                                     <div class="form-group">
                                                    <div class="col-lg-12">
                                                        <select id="genero" name="horaFim" class="genero form-control"> 
                                                             <?php  foreach ($guarda as $key => $value) { ?>
             <option value="<?php echo $guarda[$key]->horaFim;?> "> <?php echo ( isset($guarda[$key]->horaFim)?$guarda[$key]->horaFim:'nao hora de fim' ); ?> </option>
                                                             <?php } ?>
                                                        </select>
                                                    </div>
                                                    </div>
                                                    
                                                 </td>
                                                 
                                 <td>
                                  <div class="btn-group">
                                       <?php echo $securty->retornaToken();?>
                                      <button  type="submit"  class="btn btn-success" value="<?php echo  ( isset($guarda[$key]->idEvento)?$guarda[$key]->idEvento: NULL );?>" name="idEvento"> <i class="icon_plus_alt2"> </i>Indicar</button>            
                                        
                                      <i> &nbsp;    </i>
                                    <!--  <a class="btn btn-success" href="#" ><i class="icon_check_alt2"></i></a>-->
                                  </div>


                                  </td>
                                   </form>
                              </tr>
                                  
                                 
                           </tbody>
                           
                           
                        </table>
                      </section>
                  </div>
              </div>
        
          <!-- page end-->
    </body>
</html>


 