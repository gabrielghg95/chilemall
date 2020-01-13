<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chile Mall</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- master stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/responsive.css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <link rel="manifest" href="<?php echo base_url(); ?>images/favicon-one//manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
    <meta name="theme-color" content="#ffffff">

</head>

<body>
    <div class="boxed_wrapper">

        <!--Start mainmenu area-->
        <section class="mainmenu-area stricky" style="background-color: #3aa40c;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content clearfix">
                            <nav class="main-menu clearfix">
                                <div class="navbar-header clearfix">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <div class="headers1-logo float-left">
                                            <a href="<?php echo base_url(); ?>">
                                                <img style="margin-left: -30%;" src="<?php echo base_url(); ?>images/resources/logo13.png" width="155" alt="Logo Chile Mall">
                                            </a>
                                        </div>
                                        <li class="dropdown"><a href="<?php echo base_url(); ?>">Inicio</a>
                                        <li class="dropdown"><a href="#">Categorias</a>
                                            <ul>
                                                <?php
                                                foreach ($all_categorias as $categoria) {
                                                    echo '<li><a href="' . site_url('producto/inicio_producto_cat/' . $categoria['id']) . '" >' . $categoria['nombre'] . '</a></li>';
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Locales</a>
                                            <ul>
                                                <?php
                                                foreach ($all_locales as $local) {
                                                    echo '<li><a href="' . site_url('producto/inicio_producto_loc/' . $local['id']) . '" >' . $local['nombre'] . '</a></li>';
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <div class="mainmenu-right" style="heigth: 100%;">
                                <form action="<?php echo site_url('search/search_keyword'); ?>" method="post">
                                    <div class="form-group" style="margin-top: 5%;">
                                        <select name="categoriaseleccionada" style="height: 32px;">
                                            <option value="" selected>Todas las categorías</option>

                                            <?php
                                            if (!empty($all_categorias)) {
                                                foreach ($all_categorias as $categoria => $value) {
                                                    echo '<option value="' . $all_categorias[$categoria]['nombre'] . '">' . $all_categorias[$categoria]['nombre'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        <input type="text" name="keyword" placeholder="Busca aqui" required>
                                        <button type="submit" value="Search"><i style="color: white" class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End mainmenu area-->

        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_view) && $_view)
                    $this->load->view($_view);
                ?>
            </section>
            <!-- /.content -->
        </div>
        <!--Start footer area-->
        <footer class="footer-area">
            <div class="scroll-to-top scroll-to-target wow slideInRight" data-wow-delay="300ms" data-wow-duration="1500ms" data-target="html">
                <span class="fa fa-angle-up"></span>
            </div>
            <div class="container">
                <div class="row">
                    <!--Start single footer widget-->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" style="margin-top: -10%;">
                        <div class="single-footer-widget marbtm50">
                            <div class="contact-info-box">
                                <div class="footer-logo">
                                <a href="<?php echo base_url(); ?>">
                                        <img src="<?php echo base_url(); ?>images/resources/logo13.png" alt="Logo">
                                    </a>
                                </div>
                                <div class="text">
                                    <p>ANTONIO VARAS 525, OF. 207-207. <br> PUERTO MONTT</p>
                                    <ul>
                                        <li>CONTACTO@CAMARAPUERTOMONTT.CL</li>
                                        <li>HORARIO DE ATENCIÓN <br>
                                            <span>LUNES A JUEVES 09.00 A 14.00 - 15.30 A 18.30
                                                VIERNES 09.00 A 14.00 - 15.30 A 17.30</span></li>
                                        <a href="<?php echo base_url(); ?>/auth"><b>INICIAR SESIÓN ADMINISTRADOR</b></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                    <!--Start single footer widget-->
                    <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12" style="margin-top: 6%;">
                        <div class="single-footer-widget marbtm50">
                            <div class="title">
                                <h3>Auspiciadores</h3>
                            </div>
                            <div class="usefull-links">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <ul>
                                            <li><a href="#">Por definir</a></li>
                                            <li><a href="#">Por definir</a></li>
                                            <li><a href="#">Por definir</a></li>
                                            <li><a href="#">Por definir</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                </div>
            </div>
        </footer>
        <!--End footer area-->

        <!--Start footer bottom area-->
        <section class="footer-bottom-area">
            <div class="container inner-content">
                <div class="copyright-text" style="margin-left: 30%;">
                    <p>© 2019 Todos los derechos reservados por <a href="http://www.camarapuertomontt.cl/">Cámara de comercio Puerto Montt</a></p>
                </div>
            </div>
        </section>
        <!--End footer bottom area-->

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/wow.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.fancybox.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.countTo.js"></script>
    <script src="<?php echo base_url(); ?>js/appear.js"></script>
    <script src="<?php echo base_url(); ?>js/owl.js"></script>
    <script src="<?php echo base_url(); ?>js/validation.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.mixitup.min.js"></script>
    <script src="<?php echo base_url(); ?>js/isotope.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.paroller.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.enllax.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyB2uu6KHbLc_y7fyAVA4dpqSVM4w9ZnnUw"></script>
    <script src="<?php echo base_url(); ?>js/gmaps.js"></script>
    <script src="<?php echo base_url(); ?>js/map-helper.js"></script>

    <script src="<?php echo base_url(); ?>assets/language-switcher/jquery.polyglot.language.switcher.js"></script>
    <script src="<?php echo base_url(); ?>assets/timepicker/timePicker.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/html5lightbox/html5lightbox.js"></script>

    <!--Revolution Slider-->
    <script src="<?php echo base_url(); ?>plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="<?php echo base_url(); ?>js/main-slider-script.js"></script>

    <!-- thm custom script -->
    <script src="<?php echo base_url(); ?>js/custom.js"></script>



</body>

</html>