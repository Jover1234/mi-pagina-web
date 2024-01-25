<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

html{
    font-family: Arial, Helvetica, sans-serif;
    background-color: rgba(172, 255, 47, 0.127);
}

a{
    text-decoration:none;
    color:black;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.navbar{
    background-color:green;
    height: 2.5em;
    display:flex;
    border:0.0005vh solid white

}

.navbar a{
    display:flex;
    color: white;
    margin:0 auto;
    justify-content: space-between;
    padding: 0.5em;
    text-align: center;
}

.Contactanos {
text-align: center;
    height: 8em;
}

.Contactanos h2{
    font-size: 5em;
    margin-top: 0em;
    padding: 0.10em;
}
.Contactanos p{
   margin-top: -3.75em;
}

.Correo {
    display:flex;
}

.Correo img{
    height: 34em;
    margin-left: auto;
    margin-top: 1em
}

.Correo h2{
    padding-top: 4em;
    font-size: 2em;
    margin: auto;
}
.Correo h3{
    padding-top: 1em;
    font-size: 3em;
 padding-left: 2em;
}

.final {
    background-color: black;
    color: white;
    display: flex;
    margin-top: 6em;

}

.final a{
    display: flex;
    color: white;
    margin: auto;
}
    </style>
</head>
<body>
    <header>
        <div class="navbar">
        <a href="Cerrar Sesion.php"> cerrar Sesion</a>
            <a href="inicio.php">Inicio</a>
            <a href="Tienda.php">Tienda</a>
            <a href="AtencionCliente.php">Atención al cliente</a>
            <a href="leer.php">Reseñas</a>
            <a href="Carrito.php">Carrito</a>
        </div>
    </header>  
    <main>
        <section class="Contactanos">
            <article>
                <h2>Contactanos</h2>
                <p>Si Necesesitas Ayuda/Asesoria o quieres alguno de nuestros Servicios,Estaremos encantados de ayudarte</p>
            </article>
        </section>
        <section class="Correo">
            <article>
                <img src="imagenes/Atencion_ al_cliente.jpg">
            </article>
            <article>
            <h2>Envia un Correo a: TiendaAnimales@gmail.com</h2>
            <h3>LLAMA AL 987654321</h3>
            </article>
        </section>
    </main>
    <footer>
        <div class=" final">
            <a href="PoliticaPrivacidad.php">Poltica de Privacidad</a>
            <a href="Cookies.php">Cookies</a>
            <a href="Conocenos.php">Quienes Somos</a>
            <a href="Ubicaciones.php">Ubicacion</a>
    </footer>
</body>
</html>
