<!DOCTYPE html>


       
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title><?php echo 'Alterar Disponibilidade';?></title>
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
                                
                          <th>  <div class="col-lg-12"><i class="icon_pin_alt"></i> Data Indicada </div></th>
                          <th>  <div class="col-lg-12"><i class="icon_pin_alt"></i> Hora de In&iacute;cio </div> </th>
                          <th>  <div class="col-lg-12"><i class="icon_pin_alt"></i> Hora de Fim </div> </th>
                          <th>  <div class="col-lg-12"><i class=""></i>  </div> </th>
                                 </tr>
                              
                                   <?PHP  
                                      $diponivel= $disponiblidade ->buscarDisponiblidade($system->get_dados());
                                      
                                     $gv = $DataHora->buscarDataHoraRealiza($system->get_dados());
                                       $guarda=$gv->fetchAll(PDO::FETCH_OBJ);
                                   
                                     
                                        ?>
                                       
                                  <tr class="primary">
                                  
                                   <form class="navbar-form" method="POST" action="<?php echo META_URL;?>Evento_/validarDisponiblidade/">
                                       
                                       
                                         
                                 
                                                   <td>  
                                                     <div class="form-group">
                                                    <div class="col-lg-12">
                                                        <select id="genero" name="data" class="genero form-control"> 
                                       <option value="<?php echo  $diponivel->dataEscolhida;?> "> <?php echo (isset($diponivel->dataEscolhida)?$diponivel->dataEscolhida:'Não Data' ); ?> </option>            
                                                            <?php  foreach ($guarda as $key => $value) { ?>
                                  <option value="<?php echo $guarda[$key]->dataEstipulada;?> "> <?php echo ( isset($guarda[$key]->dataEstipulada)?$guarda[$key]->dataEstipulada:'Não Data' ); ?> </option>
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
                                                            
                <option value="<?php echo $diponivel->hora_Inicio;?> "> <?php echo ( isset($diponivel->hora_Inicio)?$diponivel->hora_Inicio:'hora Indefinida' ); ?> </option>                                            
                                                             <?php  foreach ($guarda as $key => $value) { ?>
              <option value="<?php echo $guarda[$key]->	horaInicio;?> "> <?php echo ( isset($guarda[$key]->horaInicio)?$guarda[$key]->horaInicio:'hora Indefinida' ); ?> </option>
                                                             <?php }?> 
                                                        </select>
                                                    </div>
                                                    </div>
                                                 </td>
                                                 <td>  
                                                     <div class="form-group">
                                                    <div class="col-lg-12">
                                                        <select id="genero" name="horaFim" class="genero form-control"> 
                <option value="<?php echo $diponivel->hora_fim;?> "> <?php echo ( isset($diponivel->hora_fim)?$diponivel->hora_fim:'Hora de fim Indefinida' ); ?> </option>                 
                                                             <?php  foreach ($guarda as $key => $value) { ?>
             <option value="<?php echo $guarda[$key]->horaFim;?> "> <?php echo ( isset($guarda[$key]->horaFim)?$guarda[$key]->horaFim:'Hora de fim Indefinida' ); ?> </option>
                                                             <?php } ?>
                                                        </select>
                                                    </div>
                                                    </div>
                                                    
                                                 </td>
                                                 
                                 <td>
                                  <div class="btn-group">
                                       <?php echo $securty->retornaToken();?>
                                      <button  type="submit"  class="btn btn-success" value="<?php echo  ( isset($diponivel->idDisp)?$diponivel->idDisp: 0 );?>" name="idAlterar"> <i class="icon_plus_alt2"> </i>Alterar</button>            
                                        
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


 