<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culqi Checkout</title>
    <script src="https://checkout.culqi.com/js/v3"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div>
        Producto 1
        <input type="button" name="" id="buyButton" value="COMPRAR" data-producto="Producto de prueba" data-precio="2000" data-descripcion="Software T-shirt">
    </div>
    
    <script>
        Culqi.publicKey = 'Aquí inserta tu llave pública';
    </script>  
    <script>
        var producto = "";
        var precio = "";
        var descripcion = "";

        $('#buyButton').on('click', function(e) {
            producto = $(this).attr('data-producto');
            precio = $(this).attr('data-precio');
            descripcion = $(this).attr('data-descripcion');
            
            Culqi.settings({
                title: producto,
                currency: 'PEN',
                description: descripcion,
                amount: precio
            });

            // Abre el formulario con la configuración en Culqi.settings
            Culqi.open();
            e.preventDefault();
        });
    </script>
    <script>
        function culqi() {
            if (Culqi.token) { // ¡Objeto Token creado exitosamente!
                var token = Culqi.token.id;    
                var email = Culqi.token.email;

                alert('Se ha creado un token:' + token);
                //En esta linea de codigo debemos enviar el "Culqi.token.id"
                //hacia tu servidor con Ajax

                var data = {
                    producto: producto,
                    descripcion: descripcion,
                    precio: precio,
                    token: token,
                    email: email
                };

                var url = "process.php";

                $.post(url, data, function(res){
                    alert(res);
                });

            } else { // ¡Hubo algún problema!
                // Mostramos JSON de objeto error en consola
                console.log(Culqi.error);
                alert(Culqi.error.user_message);
            }
        };
    </script>
</body>
</html>