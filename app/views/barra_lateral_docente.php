 <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="<?php echo META_URL;?>Rotas_/perfilDocente/">
                          <i class="icon_house_alt"></i>
                          <span>Home-Docente</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Gerir Eventos</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo META_URL;?>Rotas_/formRegistaEvento/">Criar Evento</a></li>
                            <li><a class="" href="<?php echo META_URL;?>Rotas_/fromEventoPriveligiado/">Eventos priveligiado</a></li>
                         <!-- <li><a class="" href="#">Consultar</a></li>-->
                          <li><a class="" href="<?php echo META_URL;?>Rotas_/formMeusEvento/">Meus Eventos Criados</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Gerir Docente</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo META_URL;?>Rotas_/formAlterarDocente/">Alterar dados</a></li>
                          <li><a class="" href="<?php echo META_URL;?>Rotas_/alterarPalavraPasse/">Alterar palavra pass</a></li>
                          <li><a class="" href="<?php echo META_URL;?>Rotas_/cancelaConta/">Cancelar conta</a></li>
                      </ul>
                  </li>

<!--              <li >
                 <a class="" href="<?php echo META_URL;?>Rotas_/consultar/"> <i class="icon_search"></i> <span> Consultar</span> <span class="menu-arrow arrow_carrot-right"></span> </a>     
                    
             </li>-->
             <li >                            <?php  $idx=$login->idUser;   $email=$login->email; 
                                                        $dis= base64_encode($idx);
                                                        $leaim=  base64_encode($email);
                             
                                                      ?>
                 
                 <a class="" href="/app_sie_unificado_216/FormAlertarView.php?dx3=<?php echo $dis;?>& malx=<?php echo $leaim;?>"> <i class="icon_chat"></i> <span> ! Alertar </span> <span class="menu-arrow arrow_carrot-right"></span> </a>     
                   
                   
             </li>
              </ul>
              <!--https://localhost/app_sie_unificado_216/FormAlertarView.php  sidebar menu end    <?php echo META_URL;?>Rotas_/alertar/-->
          </div>
      </aside>
      <!--sidebar end-->


  </body>
</html>
