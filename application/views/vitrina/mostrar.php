<!--Main Slider-->
<section class="main-slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" style="height: 500px; width: 100%;">
            <div class="carousel-item active">
                <img style="height: 100%;" class="d-block w-100" src="<?php echo base_url(); ?>images/index/imgslider.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img style="height: 100%;" class="d-block w-100" src="<?php echo base_url(); ?>images/index/imgslider2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img style="height: 100%;" class="d-block w-100" src="<?php echo base_url(); ?>images/index/imgslider3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
</section>
<!--End Main Slider-->

<div class="sec-title text-center" style="margin-top: 1%; margin-bottom:-8%;">
    <div class="title">Productos destacados</div>
</div>

<section id="blog-area" class="blog-default-area">
    <div class="container">
        <div class="row">
            <!--Start single blog post-->
            <?php foreach ($productos as $p) { ?>
                <?php if ($p['destacado'] == 1) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" style="margin-left: auto; margin-right: auto;">
                        <div class="single-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">

                            <a href="<?php echo site_url('producto/inicio_producto/' . $p['id']); ?>">
                                <div class="img-holder">
                                    <img src="<?php echo base_url($p['imagen']); ?>" height="100" width="100" />
                                    
                                    <div>
                                        <br>
                                        <h3><span>Precio</span><br>$<?php echo number_format($p['precio'], 0, ".", "."); ?></h3>
                                    </div>
                                </div>
                            </a>
                            <div class="text-holder">
                                <h3 class="blog-title"><a href="<?php echo site_url('producto/inicio_producto/' . $p['id']); ?>"><?php echo $p['nombre']; ?></a></h3>
                                <div class="meta-box">
                                    <ul class="meta-info">
                                        <li><a href="#"><b><?php echo $p['categoria']; ?></b></a></li>
                                        <li><a href="#"><?php echo $p['local']; ?></a></li>
                                    </ul>
                                </div>
                                <div class="text">
                                    <!-- <p></p> -->
                                    <a href="<?php echo site_url('producto/inicio_producto/' . $p['id']); ?>" class="btn-two"><span class="glyphicon-eye-open"></span>Ver Mas</a>
                                    <a class="btn-one" style="margin-left: 20%;" href="<?php echo site_url('producto/compra_producto/' . $p['id']); ?>"><span class="glyphicon-eye-open"></span>Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            <!--End single blog post-->
        </div>
    </div>
</section>
<!--End blog area-->