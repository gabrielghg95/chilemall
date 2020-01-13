
<section id="shop-area" class="single-shop-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="shop-content">
                    <!--Start single shop content-->
                    <?php echo form_open('producto/inicio_producto/' . $producto['id']); ?>
                    <div class="single-shop-content">
                        <div class="row">
                            <div class="col-lg-6">
                                
                                <div class="tile" data-scale="1.6"><img src="<?php echo base_url($producto['imagen']); ?>"></div>

                            </div>
                            <div class="col-lg-6">
                                <div class="content-box">
                                    <span class="price">$<?php echo number_format($producto['precio'], 0, ".", "."); ?></span>
                                    <h2><?php echo $producto['nombre']; ?></h2>
                                    <div class="review-box">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half"></i></li>
                                        </ul>
                                    </div>
                                    <div class="text">
                                        <p><?php echo $producto['descripcion']; ?></p>
                                    </div>
                                    <div class="container">

  
  <a href="<?php echo site_url('orden/redirect/' . $producto['id']); ?>"><button type='button' class="btn btn-success">Comprar</button></a>
  
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    #popUpWindow{
  //background: lightblue; 
}
</style>

<script>
/* Validar RUT Chileno */
function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity("Rut Correcto");
}
</script>