<!DOCTYPE html>


       
<html>
    <head>
        <meta charset="UTF-8">
        <title>  <?php
        echo "listar Docente";?></title>
    </head>
    <body>
        <?php
        
             
             include "cabecalho.php";
             $retornaSs = $securty-> retornaSsession();
             $securty->verficaSesssion($retornaSs);
             
             include "barra_lateral_admin.php";
            
       
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
                                 <th><i class="icon_group"></i> Nome</th>
                                 <th><i class="icon_group"></i> Sobrenome</th>
                                 <th><i class="icon_mail"></i> Email</th>
                                 <th><i class="icon_phone"></i> Telefone</th>
                                 <th><i class="icon_cogs"></i> Grau Academico</th>
                                 <th><i class="icon_cogs"></i> Especialidade</th>
                              </tr>
                              
                                      <?PHP  
                                     
                                        $guarda= $docente->listarDocente();
                                      
                                    foreach ($guarda as $key => $value) {
                                      
                                        ?>
                              <tr class="success">
                                  
                                   <form class="navbar-form" method="POST" action="#">
                                       
                                       
                                 <td>  <strong>  <?php echo $guarda[$key]->nome; ?> </strong></td>
                                 <td><strong>  <?php echo $guarda[$key]->sobrenome; ?> </strong></td>
                                 <td><strong>  <?php echo $guarda[$key]->email; ?> </strong></td>
                                 <td><strong>  <?php echo $guarda[$key]->telefone; ?> </strong></td>
                                  <td><strong>  <?php echo $guarda[$key]->grauAcademico; ?> </strong></td>
                                   <td><strong>  <?php echo $guarda[$key]->especialidade; ?> </strong></td>
                                
                                
                                 <td>
                                  <div class="btn-group">
                                    
                                      <!--<button  type="submit"  class="btn btn-success" value="<?php echo $guarda[$key]->idUser; ?>" name="id"> <i class="icon_plus_alt2"> </i> </button>-->            
                                        
                                    
                                    <!--  <a class="btn btn-success" href="#" ><i class="icon_check_alt2"></i></a>-->
                                  </div>


                                  </td>
                                   </form>
                              </tr>
                                  
                                    <?php  } ?>
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
        
          <!-- page end-->
    </body>
</html>

