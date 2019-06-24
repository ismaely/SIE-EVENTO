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
          
           
        
        include "barra_lateral_estudante.php";


        if ($login->nivel == NIVEL_ESTUDANTE)
            include "barra_lateral_estudante.php";


        if ($login->nivel== NIVEL_DOCENTE)
            include "barra_lateral_docente.php";
        ?>
        <br/>
       <div class="row" style="margin-left:175px; margin-top: 40px; ">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="centro-titulo">
                           <p>
                               
                           <h3> <strong> <?php    
                                   
                                  $buscarDados = $evento->buscarDados($system->get_dados());
                                 echo 'Evento:    ' .$buscarDados->nomeEvento;  ?> </strong></h3>
                         
                          </p>
                          </div>
                              
                          
                          <table class="table table-striped table-advance table-hover">
                                
                           <tbody>
                               
                              <tr>
                                 
                                  <th><i class="icon_calendar"></i> Data de realiza&ccedil;&atilde;o</th>
                                  <th><i class="icon_pin_alt"></i> Hora de In&iacute;cio</th>
                                 <th><i class="icon_pin_alt"></i> Hora de Fim</th>
                                 <th><i class="icon_group"></i> Total Contabilizado</th>
                               
                              </tr>
                             
                                      <?PHP  
                            
                                $guarda= $disponiblidade-> contarDisponibilidade($system->get_dados());
                                
                                    if(!empty($guarda)):
                                  
                                        while($item= $guarda->fetch(PDO::FETCH_OBJ)) {
                                      
                                        ?>
                              <tr class="success">
                                  
                                
                                 <td><?php echo ( isset($item->dataEscolhida) ? $item->dataEscolhida : '*' ); ?></td>
                                 <td><?php echo ( isset($item->hora_Inicio) ? $item->hora_Inicio : '*' ); ?></td>
                                 <td><?php echo ( isset($item->hora_fim) ? $item->hora_fim : '*' ); ?></td>
                                  <td><?php echo ( isset($item->Quantidade) ? $item->Quantidade : '0' ); ?></td>
                                    
                                
                              </tr>
                                  
                                   <?php
                                   
                                   
                                    }
                                    
                                    else:
                                   ?>
                                <td><?php echo  '****'; ?></td>
                                 <td><?php echo '****' ; ?></td>
                                 <td><?php echo  '****' ; ?></td>
                                  <td><?php echo  '00000' ; ?></td>
                              
                                    <?php
                                    
                                    
                              
                              endif;
                                    
                                    ?>
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
        
          <!-- page end-->
    </body>
</html>

