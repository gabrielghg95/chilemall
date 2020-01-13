<section id="blog-area" class="blog-default-area">
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead><h2>Su Compra fue Exitosa!</h2>
                    <tr>
                        <th scope="col">Campo</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Monto</td>
                        <td id="amount"></td>
                    </tr>
                    <tr>
                        <td>Codigo autorizacion</td>
                        <td id="authorizationCode"></td>
                    </tr>
                    <tr>
                        <td>Codigo de respuesta</td>
                        <td id="responseCode"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    document.getElementById('amount').innerHTML = window.localStorage.getItem('amount');
    document.getElementById('authorizationCode').innerHTML = window.localStorage.getItem('authorizationCode');
    document.getElementById('responseCode').innerHTML = window.localStorage.getItem('responseCode');
</script>