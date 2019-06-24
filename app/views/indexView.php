<!DOCTYPE html>


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Refresh" content="21;url=/app_sie_unificado_2016/">
    <!-- this line will appear only if the website is visited with an iPad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

    <title>Sistema de Informação de evento</title>

    <link rel="stylesheet" type="text/css" media="all" href="./public/css1/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="all" href="./public/css1/style.css" />
    <link rel='stylesheet' id='responsive-css'  href='./public/css1/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='rs-css'  href='./public/sliders/revolution-slider/css/slider.css' type='text/css' media='all' />
    <link rel='stylesheet' id='rs-settings-css'  href='./public/sliders/revolution-slider/rs-plugin/css/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' id='rs-captions-css'  href='./public/sliders/revolution-slider/rs-plugin/css/captions.css' type='text/css' media='all' />

 
    <script type='text/javascript' src='./public/js1/jquery/jquery.js'></script>
</head>

<body class="home page no_js responsive stretched">

<div class="bg-shadow">

<div id="wrapper" class="container group">

    



<div id="header" class="group">
    <div class="group container">
        <div class="row">
            <div class="span12">

                <div class="row">
                  
                    <div id="menu" class="span8 group">
                        <!-- START MAIN NAVIGATION -->
                        <div class="menu">
                            <ul id="nav" class="sf-menu">
                                <li class="nav-icon-hi current_page_item">
                                    <a href="<?php echo LOGIN;?>">
                                      <strong>   Login </strong>
                                        <div style="position:absolute; left: 50%;">
                                            <span class="triangle">&nbsp;</span>
                                        </div>
                                    </a>
                                    
                                </li>
                                                          
                                <li class="nav-icon-monitor">
                                    <a href="<?php echo CHAMAR_ESTUDANTE;?>">
                                        <strong>  Registra-se  </strong>
                                        <div style="position:absolute; left: 50%;">
                                            <span class="triangle">&nbsp;</span>
                                        </div>
                                    </a>
                                    
                                </li>
                            
                                
                                    
                                    <?php $util = new UtilizadorDao; 
                               $valor=$util->contarCadastro();   
                               //var_dump($valor);
                                    ?>
                                
                            </ul>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="border-header"></div>
</div>
    



<!--  BANNER ROLANTE DA PAGINA-->
<div id="slider-revolution-slider" class="slider slider-revolution-slider revolution-slider">
    <div class="shadowWrapper">

    
        <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:400px;">
            <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:400px;height:400;">
                <ul>
                    <li data-transition="random" data-slotamount="7" data-masterspeed="300" >
                        <img src="./public/images/slider/1-bg.jpg">

                        <div class="tp-caption lfb"
                             data-x="30"
                             data-y="13"
                             data-speed="2000"
                             data-start="300"
                             data-easing="easeOutQuint">
                            <img src="./public/images/slider/logo3.png" alt="Image1">
                        </div>

                        <div class="tp-caption main_title lft"
                             data-x="490"
                             data-y="71"
                             data-speed="1000"
                             data-start="1500"
                             data-easing="easeOutQuint"  >
                         
                            Sistema de Informação de Evento
                        </div>

                        <div class="tp-caption paragraph lfb"
                             data-x="489"
                             data-y="143"
                             data-speed="1000"
                             data-start="1800"
                             data-easing="easeOutQuint"  >
                          Informação na Hora e a Qualquer Lugar
                            <br>
                            <strong>  Mais de <?php echo ''.$valor->Quantidade; ?> Pessoas Ja Cadastrado </strong></br>
                        </div>
                        
                    </li>
                <li data-transition="random" data-slotamount="7" data-masterspeed="300" >
                    <img src="images/slider/2-bg.jpg" alt="2-bg" >

                    <div class="tp-caption main_title lfr"
                         data-x="0"
                         data-y="60"
                         data-speed="1000"
                         data-start="300"
                         data-easing="easeOutQuint"  >
                        Docentes <span style="font-family:'Dancing Script';font-weight:400;">&</span> <br />
                        Estudante
                    </div>
                    
                    <div class="tp-caption paragraph lfb"
                         data-x="0"
                         data-y="194"
                         data-speed="1000"
                         data-start="700"
                         data-easing="easeOutQuint"  >
                        Tudo Que Voce Precisa Saber... <br />
                        <b>Não fica de fora Vem e curta os melhores eventos.</b>
                    </div>


                    <div class="tp-caption lfb"
                         data-x="598"
                         data-y="166"
                         data-speed="900"
                         data-start="2000"
                         data-easing="easeOutQuint"  >
                        <img src="./public/images/slider/2-l2.png" alt="Image 6">
                        
                    </div>

                    <div class="tp-caption lfl"
                         data-x="795"
                         data-y="158"
                         data-speed="900"
                         data-start="2400"
                         data-easing="easeOutQuint"  >
                      <img src="./public/images/slider/2-l3.png" alt="Image 5">
                    </div>
                    
                </li>
               
                
                
                </ul>
            </div>
        </div>

    <script type="text/javascript">

        var tpj=jQuery;

        tpj.noConflict();

        var revapi1;

        tpj(document).ready(function() {

            if (tpj.fn.cssOriginal != undefined)
                tpj.fn.css = tpj.fn.cssOriginal;

            if(tpj('#rev_slider_1_1').revolution == undefined)
                revslider_showDoubleJqueryError('#rev_slider_1_1');
            else
                revapi1 = tpj('#rev_slider_1_1').show().revolution(
                    {
                        delay:9000,
                        startwidth:1170,
                        startheight:400,
                        hideThumbs:200,

                        thumbWidth:100,
                        thumbHeight:50,
                        thumbAmount:3,

                        navigationType:"none",
                        navigationArrows:"nexttobullets",
                        navigationStyle:"round",

                        touchenabled:"on",
                        onHoverStop:"off",

                        navOffsetHorizontal:0,
                        navOffsetVertical:20,

                        shadow:0,
                        fullWidth:"on",

                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,

                        shuffle:"off",

                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0					});

        });	//ready

    </script>

    <!-- END REVOLUTION SLIDER -->
    </div>
</div>

<div id="page-meta" class="container">
  
    <div class="slogan">
      
    </div>
</div>


<!-- END FOOTER -->

<!-- START COPYRIGHT -->
<div id="copyright">
    <div class="container">
       
    </div>
</div>


</div>


</div>

  <script type='text/javascript' src='./public/js1/jquery.mobilemenu.js'></script>

<script type='text/javascript' src='./public/js1/jquery.superfish.js'></script>
<script type='text/javascript' src='./public/js1/jquery.themepunch.plugins.min.js'></script>
<script type='text/javascript' src='./public/js1/jquery.themepunch.revolution.js'></script>
<script type='text/javascript' src='./public/js1/jquery.tipsy.js'></script>
<script type='text/javascript' src='./public/js1/responsive.js'></script>



</html>