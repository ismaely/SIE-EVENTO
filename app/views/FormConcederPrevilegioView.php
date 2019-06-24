<!DOCTYPE html>


<html lang="pt">
    <head>
        <meta charset="UTF-8">
       
    </head>
    <body>
        <?php
        
          $titulo="Conceder Previlegios";
           include "cabecalho.php";
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
             include "barra_lateral_docente.php";
            
              
              ?>
          <br/>
          <div class="row" style="margin-left:160px; margin-top: 40px; ">
                  <div class="col-lg-12">
                      <section class="panel">
                        
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                               
                              <tr>
                                 <th><i class="icon_like"></i> Nome do Evento</th>
                                 <th><i class="icon_cogs"></i> Email do Privilegiado</th>
                                 <th><i class="icon_cogs"></i> Telefone</th>
                                 <th><i class="icon_check"></i>  Privil&eacute;gio</th>
                                  <th><i class="icon_check"></i> Confirmar</th>
                              </tr>
                              <?PHP      
                               
                              
                                       $dados=$evento->buscarDados($system->get_dados());
                                     //    $guarda= $evento->listarEvento();
                                      
                                      
                                        ?>
                              <tr class="success">
                                  
                               <form class="navbar-form" method="POST" action=" <?php echo META_URL;?>Evento_/validarPrivilegio/">
                                   
                                   <td> <strong><?php echo $dados->nomeEvento ?> </strong></td>
                                 
                                 <td> <div class="col-log-2"> 
                                         
                                         <input class="form-control" name="email" type="text" title="Email "placeholder="Digita o email " >
                                     
                                  </div>
                                 </td>
                                  <td> <div class="col-log-2"> 
                                         
                                          <input class="form-control" name="telefone" type="text" title="Telefone" tabindex="10" placeholder="N&uacute;mero de Telefone" >
                                     
                                  </div>
                                 </td>
                                 
                                         <td>
                                                 <div class="col-lg-7">
                                                        <select id="genero" name="previlegio" class="genero form-control">
                                                            <option value="">Escolha o Privil&eacute;gio</option>
                                                            <option value="1"> Apenas Inscri&ccedil;&atilde;o</option>
                                                            <option value="2"> Apenas,Inscri&ccedil;&atilde;o, Altera&ccedil;&atilde;o, Cancelar </option>
                                                        </select>
                                                    </div>
                                        </td>
                                 
                                 
                                 <td>
                                  <div class="btn-group">
                                      <?php echo $securty->retornaToken(); ?>
                                      <button  type="submit"  class="btn btn-success" value="<?php echo $system->get_dados(); ?>"name="idEvento"> <i class="icon_plus_alt2"> </i>Atribuir </button>            
                                         
                                      <i> &nbsp;    </i>
                                    <!--  <a class="btn btn-success" href="#" ><i class="icon_check_alt2"></i></a>-->
                                  </div>


                                  </td>
                                   </form>
                           
                         
                              </tr>
                                  
                                    <?php //} ?>
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
        
          <!-- page end-->
    </body>
</html>


 