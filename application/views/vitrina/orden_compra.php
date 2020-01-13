<?php
$amount = $producto['precio'];
$key = $producto['id'];
?>

<div class="modal-content" style="margin-top: 5%;">
  <!-- header -->
  <h3 class="modal-title" style="margin-left: auto; margin-right: auto;">Detalles de facturación</h3>

  <!-- body -->
  <div class="modal-header" style="margin-left: 2%; margin-left: auto; margin-right: auto;">
    <!-- cambiar auth/login por un cargar/rut -->
    <form role="form" action="<?php echo base_url(); ?>Cargarcliente/rut" method="post">
      <div class="form-group">


        <?php if (!isset($mensaje)) { ?><?php } else {
                                          if ($mensaje == "No ha realizado compras con este rut en nuestra plataforma.") { ?> <a style="color:red;"><b><?php echo $mensaje;
                                                                                                                                                          } else { ?><a style="color:#3aa40c;"><b><?php echo $mensaje; ?> &#10004; <?php }
                                                                                                                                                                                                                                    } ?></b></a><br>
            <a style="color:red;" title="Obligatorio"><b>* </b></a>Rut: <input type="text" id="rut" name="rut" required oninput="checkRut(this)" value="<?php if (isset($rut)) {
                                                                                                                                                          echo $rut ?><?php } else { } ?>" />
            <input type="number" id="idproducto" name="idproducto" class="form-control" value="<?php echo $producto['id'] ?>" hidden />
            <button type="submit" class="btn btn-success">Verificar Rut</button><br>
    </form>
    <?php echo form_open('orden/add2'); ?>
    <input type="number" id="idproducto" name="idproducto" class="form-control" value="<?php echo $producto['id'] ?>" hidden />
    <?php if (!isset($mensaje)) { ?>

      <a style="color:red;" title="Obligatorio"><b>* </b></a>Nombre: <input type="text" id="nombre" name="nombre" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                  echo $cliente['nombre'];
                                                                                                                                                                                } ?>" max="64" />
      <a style="color:red;" title="Obligatorio"><b>* </b></a>Apellido: <input type="text" id="apellido" name="apellido" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                        echo $cliente['apellido'];
                                                                                                                                                                                      } ?>" max="64" />
      <a style="color:red;" title="Obligatorio"><b>* </b></a>Dirección: <input type="text" id="direccion" name="direccion" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                            echo $cliente['direccion'];
                                                                                                                                                                                          } ?>" max="100" />
      <a style="color:red;" title="Obligatorio"><b>* </b></a>Comuna: <input type="text" id="comuna" name="comuna" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                  echo $cliente['comuna'];
                                                                                                                                                                                } ?>" max="64" />
      <a style="color:red;" title="Obligatorio"><b>* </b></a>Ciudad: <input type="text" id="ciudad" name="ciudad" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                  echo $cliente['ciudad'];
                                                                                                                                                                                } ?>" max="64" />
      <a style="color:red;" title="Obligatorio"><b>* </b></a>Teléfono: <input type="number" id="telefono" name="telefono" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                          echo $cliente['telefono'];
                                                                                                                                                                                        } ?>" max="9" />
      <a style="color:red;" title="Obligatorio"><b>* </b></a>Correo: <input type="email" id="correo" name="correo" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                    echo $cliente['correo'];
                                                                                                                                                                                  } ?>" max="100" />

      <?php } else {
        if ($mensaje == "Se cargaron sus datos ingresados anteriormente.") { ?>

        <a style="color:red;" title="Obligatorio"><b>* </b></a>Nombre: <input type="text" id="nombre" name="nombre" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                      echo $cliente['nombre'];
                                                                                                                                                                                    } ?>" max="64" readonly />
        <a style="color:red;" title="Obligatorio"><b>* </b></a>Apellido: <input type="text" id="apellido" name="apellido" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                            echo $cliente['apellido'];
                                                                                                                                                                                          } ?>" max="64" readonly />
        <a style="color:red;" title="Obligatorio"><b>* </b></a>Dirección: <input type="text" id="direccion" name="direccion" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                                echo $cliente['direccion'];
                                                                                                                                                                                              } ?>" max="100" readonly />
        <a style="color:red;" title="Obligatorio"><b>* </b></a>Comuna: <input type="text" id="comuna" name="comuna" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                      echo $cliente['comuna'];
                                                                                                                                                                                    } ?>" max="64" readonly />
        <a style="color:red;" title="Obligatorio"><b>* </b></a>Ciudad: <input type="text" id="ciudad" name="ciudad" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                      echo $cliente['ciudad'];
                                                                                                                                                                                    } ?>" max="64" readonly />
        <a style="color:red;" title="Obligatorio"><b>* </b></a>Teléfono: <input type="number" id="telefono" name="telefono" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                              echo $cliente['telefono'];
                                                                                                                                                                                            } ?>" max="9" readonly />
        <a style="color:red;" title="Obligatorio"><b>* </b></a>Correo: <input type="email" id="correo" name="correo" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                        echo $cliente['correo'];
                                                                                                                                                                                      } ?>" max="100" readonly />


      <?php } else { ?>

        <a style="color:red;" title="Obligatorio"><b>* </b></a>Nombre: <input type="text" id="nombre" name="nombre" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                      echo $cliente['nombre'];
                                                                                                                                                                                    } ?>" max="64" />
        <a style="color:red;" title="Obligatorio"><b>* </b></a>Apellido: <input type="text" id="apellido" name="apellido" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                            echo $cliente['apellido'];
                                                                                                                                                                                          } ?>" max="64" />
        <a style="color:red;" title="Obligatorio"><b>* </b></a>Dirección: <input type="text" id="direccion" name="direccion" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                                echo $cliente['direccion'];
                                                                                                                                                                                              } ?>" max="100" />
        <a style="color:red;" title="Obligatorio"><b>* </b></a>Comuna: <input type="text" id="comuna" name="comuna" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                      echo $cliente['comuna'];
                                                                                                                                                                                    } ?>" max="64" />
        <a style="color:red;" title="Obligatorio"><b>* </b></a>Ciudad: <input type="text" id="ciudad" name="ciudad" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                      echo $cliente['ciudad'];
                                                                                                                                                                                    } ?>" max="64" />
        <a style="color:red;" title="Obligatorio"><b>* </b></a>Teléfono: <input type="number" id="telefono" name="telefono" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                              echo $cliente['telefono'];
                                                                                                                                                                                            } ?>" max="9" />
        <a style="color:red;" title="Obligatorio"><b>* </b></a>Correo: <input type="email" id="correo" name="correo" class="form-control" value="<?php if (!isset($cliente)) { ?><?php } else {
                                                                                                                                                                                        echo $cliente['correo'];
                                                                                                                                                                                      } ?>" max="100" />
    <?php }
    } ?>
    <input type="hidden" name="cantidad" value="1" class="form-control" id="cantidad" />
    <input type="hidden" name="precio" value="<?php echo $amount; ?>" class="form-control" id="precio" />
    <input type="hidden" name="producto_fk" value="<?php echo $key; ?>" class="form-control" id="producto_fk" />
    <input type="hidden" name="cliente_fk" value="<?php if (isset($rut)) {
                                                    echo $rut ?><?php } else { } ?>" class="form-control" id="cliente_fk" />

    <!-- Div de producto pedido, agregar diseño. -->
    <br>
    <div class="modal-footer" style="border: red 4px solid;">
      <div style="width: 400px;">
        <h4 style="color:red;"> &#9888;¡AVISO IMPORTANTE! &#9888;</h4>
        <p style=""> La plataforma se encuentra en modo de prueba, <b>no debe ingresar sus datos bancarios</b>,
          si realiza una compra, esta no será procesada y no nos hacemos responsables por la perdida de dicha compra y de su dinero.</p>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">
          Continuar Compra
        </button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>

</div>
<!-- footer -->
<!--Agregar webpay acá-->



<style>
  #popUpWindow {
    background: lightblue;
  }
</style>

<script>
  /* Validar RUT Chileno */
  function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.', '');
    // Despejar Guión
    valor = valor.replace('-', '');

    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();

    // Formatear RUN
    rut.value = cuerpo + '-' + dv

    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if (cuerpo.length < 7) {
      rut.setCustomValidity("RUT Incompleto");
      return false;
    }

    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;

    // Para cada dígito del Cuerpo
    for (i = 1; i <= cuerpo.length; i++) {

      // Obtener su Producto con el Múltiplo Correspondiente
      index = multiplo * valor.charAt(cuerpo.length - i);

      // Sumar al Contador General
      suma = suma + index;

      // Consolidar Múltiplo dentro del rango [2,7]
      if (multiplo < 7) {
        multiplo = multiplo + 1;
      } else {
        multiplo = 2;
      }

    }

    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);

    // Casos Especiales (0 y K)
    dv = (dv == 'K') ? 10 : dv;
    dv = (dv == 0) ? 11 : dv;

    // Validar que el Cuerpo coincide con su Dígito Verificador
    if (dvEsperado != dv) {
      rut.setCustomValidity("RUT Inválido");
      return false;
    }

    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
  }
  $(".update_form").click(function() { // changed
    $.ajax({
      type: "POST",
      url: "approve_test.php",
      data: $(this).parent().serialize(), // changed
      success: function(data) {
        alert(data); // show response from the php script.
      }
    });
    return false; // avoid to execute the actual form submission.
  });
</script>