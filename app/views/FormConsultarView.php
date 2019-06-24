
<!DOCTYPE html>

<html lang="pt">
<?php 
    $securty = new SegurancaDao;
     $retornaSs = $securty-> retornaSsession();
           $securty->verficaSesssion($retornaSs);
           $login= $_SESSION['login'];
?>
    <head>
        
        <meta charset="UTF-8" />

        <!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

        <title>Registar Estudante.</title>


        <link rel = "stylesheet" href = "../public/css/bootstrap.min.css">
        <link href="../../public/css/bootstrap-theme_1.css" rel="stylesheet">
        <link href="../../public/css/elegant-icons-style.css" rel="stylesheet" />
        <link href="../../public/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../../public/css/style.css" rel="stylesheet">
        <link href="../../public/css/style-responsive.css" rel="stylesheet" media="all" />
       <link href="../../public/css/css-form.css" rel="stylesheet" media="all" />
       
        <script src="../../public/js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
        <script src="../../public/js/jquery.nicescroll.js" type="text/javascript"></script>


        <script src="../../public/js/jquery.validate.js"></script>

        <script src="../../public/js/jquery.maskedinput.js"></script>
        <script src="../../public/js/form-validation-script.js"></script>
        <script src="../../public/js/scripts.js"></script>
         <script src="../../public/js/validar-form.js"></script>
         <script type="text/javascript" src="../../public/js/funcs.js"></script>

         
         
         
    </head>

    <body class="home page no_js responsive stretched">

        <!-- container section start -->
        <section id="container" class="">
            <!--header start-->
            <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="SIE" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="" class="logo">SIE <span class="lite">2016 <?php  ?></span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                      <!--   <form class="navbar-form" method="POST" action="<?php echo URL;?>EventosDao/consultar/">-->
                           <input class="form-control" placeholder="Search" name="busca"type="text" onkeyup="buscarNoticias(this.value)">
                       <!-- </form>-->
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>
                                     
             <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- task notificatoin start -->
                    <li id="task_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="icon-task-l"></i>
                            <span class="badge bg-important"><?php echo '4';?></span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue"> <?php ?></p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc"><?Php echo 'eventos';?> </div>
                                        <div class="percent"> %</div>
                                    </div>
                                    <?php echo 'seja bem vindo';?>
                                </a>
                            </li>
                            
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc"><?Php echo 'privilegio';?></div>
                                        <div class="percent"> %</div>
                                    </div>
                                     <?php echo 'agora tens privilegio no novo evento';?>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc"><?Php echo 'convites';?></div>
                                        <div class="percent"> %</div>
                                    </div>
                                     <?php echo 'tas convidado pra o evento';?>
                                </a>
                            </li>
                            
                            <li class="external">
                                <a href="#"><?Php echo 'outros';?></a>
                            </li>
                        </ul>
                    </li>
                    <!-- task notificatoin end -->
                    <!-- inbox notificatoin start-->
                    
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important"><?php echo '3';?></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue"> <?php echo 'Novas Notificaçoes';?></p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary"><i class="icon_profile"></i></span> 
                                    <?php echo 'os teus amigos estaram no evento';?>
                                    <span class="small italic pull-right"> <?php echo '5:00';?></span>
                                </a>
                            </li>
                            
                           
                            <li>
                                <a href="#">
                                    <span class="label label-success"><i class="icon_like"></i></span> 
                                     <?php echo 'cancelado a sua inscrição';?>
                                    <span class="small italic pull-right">  <?php ?></span>
                                </a>
                            </li>                            
                            
                        </ul>
                    </li>
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="<?php echo ($login->foto!=''?'../../arquivos/'.$login->foto.'':'../../arquivos/padrao.jpg');?>" height="40" width="40">
                            </span>
                            <span class="username"><?php echo $login->sobrenome; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> Meu Perfil</a>
                            </li>
                           
                            <li>
                               <a href="<?PHP echo META_URL;?>Rotas_/logout/"><i class="icon_key_alt"></i> Logout</a>
                            </li>
                           
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>l
                <!-- notificatoin dropdown end-->
            </div>
      </header>      

            <!--header end-->

            
            
        <?php
     
           $retornaSs = $securty-> retornaSsession();
            $securty->verficaSesssion($retornaSs);
              
             
             
              if($login->nivel==NIVEL_ESTUDANTE)
              include "barra_lateral_estudante.php";
             
              
               if($login->nivel==NIVEL_DOCENTE)
               include "barra_lateral_docente.php";
              
               if($login->nivel==NIVEL_ADMIN)
              include "barra_lateral_admin.php";
        ?>      
            
          

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                   Dados da Consulta
                                </header>
                                <div class="panel-body">
                                    <div class="form">
                                   
                                        
                                        <div id="resultado"></div>
                                          <br /><br />
                                         <div id="conteudo"></div>


                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
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
        <!-- container section end -->

        <!-- javascripts -->

    </body>
</html>                                