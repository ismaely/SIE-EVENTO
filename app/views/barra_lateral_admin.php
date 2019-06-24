 <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="<?php echo META_URL;?>Rotas_/perfilAdmin/">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
                  </li>
             
                  
                  <li class="">
                      <a class="" href="<?php echo META_URL;?>Rotas_/registarAdmin/">
                          <i class=""></i>
                          <span>Registar Administrador</span>
                      </a>
                  </li>
                   <li class="">
                      <a class="" href="<?php echo META_URL;?>Rotas_/formRegistaDocente/">
                          <i class=""></i>
                          <span>Registar Docente</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="" href="<?php echo META_URL;?>Rotas_/listarDocente/">
                          <i class=""></i>
                          <span>Listar Docente </span>
                      </a>
                  </li>
                  
                  <li class="">
                      <a class="" href="<?php echo META_URL;?>Rotas_/registarSala/">
                          <i class=""></i>
                          <span>Registar Sala</span>
                      </a>
                  </li>
                   
				     
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Gerir Utilizador</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo META_URL;?>Rotas_/formAlterarAdmin/">Alterar dados</a></li>
                          <li><a class="" href="<?php echo META_URL;?>Rotas_/alterarPalavraPasse/">Alterar palavra pass</a></li>
                         
                      </ul>
                  </li>
                                           <?php  $idx=$login->idUser;   $email=$login->email; 
                                                        $dis= base64_encode($idx);
                                                        $leaim=  base64_encode($email);
                             
                                                      ?>
                  <li >
                 <a class="" href="/app_sie_unificado_216/FormAlertarView.php?dx3=<?php echo $dis;?>& malx=<?php echo $leaim;?>"> <i class="icon_chat"></i> <span> ! Alertar </span> <span class="menu-arrow arrow_carrot-right"></span> </a>     
                    
             </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      
      
       <!-- javascripts -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
	<script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
	<script src="assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="js/xcharts.min.js"></script>
	<script src="js/jquery.autosize.min.js"></script>
	<script src="js/jquery.placeholder.min.js"></script>
	<script src="js/gdp-data.js"></script>	
	<script src="js/morris.min.js"></script>
	<script src="js/sparklines.js"></script>	
	<script src="js/charts.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>

  </body>
</html>
