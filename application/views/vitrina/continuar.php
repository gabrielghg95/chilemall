<?php

require_once './vendor/autoload.php';

use Transbank\Webpay\Webpay;
use Transbank\Webpay\Configuration;

$transaction = (new Webpay(Configuration::forTestingWebpayPlusNormal()))
    ->getNormalTransaction();

$amount = $producto['precio'];
$sessionId = 'sessionId';
$buyOrder =  strval(rand(10000, 9999999));
$returnUrl = 'http://localhost/chilemall/orden/mostrar_orden';
$finalUrl = 'http://localhost/chilemall/orden/final_orden';

$initResult = $transaction->initTransaction(
    $amount,
    $sessionId,
    $buyOrder,
    $returnUrl,
    $finalUrl
);

$formAction = $initResult->url;
$tokenWs = $initResult->token;

?>

<div class="modal-content" style="margin-top: 5%;">
    <!-- header -->
    <h3 class="modal-title" style="margin-left: auto; margin-right: auto;">Confirmar Transaccion</h3>

    <!-- body -->
    <div class="modal-header" style="margin-left: 2%; margin-left: auto; margin-right: auto;">
        <!-- cambiar auth/login por un cargar/rut -->
        <form role="form" action="<?php echo $formAction ?>" method="POST">
            <!-- Div de producto pedido, agregar diseño. -->
            <div style="margin-top: 10%; display: inline-block;">
                <img src="<?php echo base_url($producto['imagen']); ?>" style="width: 40%; heigth: 40%;">
                <h6> Producto: <?php echo $producto['nombre'] ?></h6>

            </div>
            <h5>Total a pagar: $<?php echo number_format($producto['precio'], 0, ".", "."); ?></h5>
            <br>
            <div class="modal-footer" style="border: red 4px solid;">
                <div style="width: 400px;">
                    <h4 style="color:red;"> &#9888;¡AVISO IMPORTANTE! &#9888;</h4>
                    <p style=""> La plataforma se encuentra en modo de prueba, <b>no debe ingresar sus datos bancarios</b>,
                        si realiza una compra, esta no será procesada y no nos hacemos responsables por la perdida de dicha compra y de su dinero.</p>
                </div>
                <input type="hidden" name="token_ws" value="<?php echo $tokenWs ?>" />
                <button type="submit" class="btn btn-primary">Comprar</button>
            </div>
        </form>
    </div>

</div>
<!-- footer -->
<!--Agregar webpay acá-->