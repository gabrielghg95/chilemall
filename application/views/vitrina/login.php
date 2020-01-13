<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>images/favicon-one/iconchilemall.png">
      <link rel="stylesheet" href="<?php echo base_url(); ?>style.css">

  
</head>

<body>

  <!--<p class="tip">Click on button in image container</p> -->
<div class="cont">
  <form class="form sign-in" action="<?php echo base_url();?>auth/login" method="post">
    <h2>Iniciar sesión</h2>
    <label>
      <span style="color:black;">Correo</span>
      <input type="email" name="email" required/>
    </label>
    <label>
      <span style="color:black;">Contraseña</span>
      <input type="password" name="password" required/>
    </label>
    
    <button class="submit">Ingresar</button>
    <?php if(isset($mensaje)){
    ?>
    
   <div style="color: red; font-weight: bold; text-align: center;"><?php echo $mensaje; ?></div>

    <?php
    }else{
      echo " ";
    } ?>
    </form>

    
    
  
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <a href="index.html">
          <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>/images/resources/logo13.png" alt="Logo Chile Mall"></a>
      </a>
        <p>¡Acceso y oportunidades de expandir tu negocio!</p>
      </div>
      <div class="img__text m--in">
        <a href="index.html">
        <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>/images/resources/logo13.png" alt="Logo Chile Mall"></a>
      </a>
      <p>¡Acceso y oportunidades de expandir tu negocio!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Ver más</span>
        <span class="m--in">Volver</span>
      </div>
    </div>
    <!-- AGREGAR DESCRIPCIÓN O ALGO-->
    <div class="form sign-up">
      <h2>CHILE MALL</h2>
      <p style="margin-top: 2%;">Bienvenido a la plataforma virtual de la Camara de Comercio de Puerto Montt!</p>
    </div>
  </div> 
</div>
    <script  src="<?php echo base_url(); ?>script.js"></script>




</body>

</html>
