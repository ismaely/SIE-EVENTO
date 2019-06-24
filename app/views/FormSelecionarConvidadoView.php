<!DOCTYPE html>


       
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>  <?php
        echo "selecionar convidado";?></title>
    </head>
    <body>
        <?php
        
             
             include "cabecalho.php";
             $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
               $securty->criarToken();
             include "barra_lateral_docente.php";
            
       
        ?>
        <br/>
       <div class="row" style="margin-left:175px; margin-top: 40px; ">
                  <div class="col-lg-12">
                      <section class="panel">
                         <?php 
                                 ?>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                               
                              <tr>
                                 <th><i class="icon_like"></i> Evento</th>
                                 <th><i class="icon_calendar"></i> Data de realiza&Ccedil;&Atilde;o</th>
                                 <th><i class="icon_pin_alt"></i> Hora de In&Iacute;cio</th>
                                 <th><i class="icon_pin_alt"></i> Hora de Fim</th>
                                 <th><i class="icon_group"></i> Nome do Convidado</th>
                                 <th><i class="icon_cogs"></i> Email do Convidado</th>
                              </tr>
                              
                                      <?PHP  
                                     
                                        $guarda= $evento-> buscarDados($system->get_dados());
                                      
                                   // foreach ($guarda as $key => $value) {
                                      
                                        ?>
                              <tr class="success">
                                  
                           <form class="navbar-form" method="POST" action="<?php echo META_URL;?>Inscricao_/convidado/" id="form">
                                       
                                       
                                 <td> <?php echo $guarda->nomeEvento; ?></td>
                                 <td><?php echo $guarda->dataRealiza;?></td>
                                 <td><?php echo  $guarda->horaInicioRealiza;?></td>
                                 <td><?php echo  $guarda->horaFimRealiza;?></td>
                                
                                 <td> <div class="col-log-4"> <input class="form-control" name="nome" type="text" title="nome do convidado"placeholder="Informa o nome" >
                                         <td> <div class="col-log-4"> <input class="emailTel form-control" name="email" type="text" title="Email ou Telefone"placeholder="Digita o email ou Telefone" >
                                     
                                  </div>
                                 </td>
                                 <td>
                                  <div class="btn-group">
                                      <?php  echo $securty->retornaToken();?>
                                      <button  type="submit"  class="btn btn-success" value="<?php echo $guarda->idEvento; ?>" name="id"> <i class="icon_plus_alt2"> </i>Convidar </button>            
                                        
                                   
                                    <!--  <a class="btn btn-success" href="#" ><i class="icon_check_alt2"></i></a>-->
                                  </div>


                                  </td>
                                   </form>
                              </tr>
                                  
                                    <?php  ?>
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
        
          <!-- page end-->
    </body>
</html>

