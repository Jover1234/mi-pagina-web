<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html{
    font-family: Arial, Helvetica, sans-serif;
    background-color:rgba(172, 255, 47, 0.125)
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

}

.navbar a{
    display:flex;
    color: white;
    margin:0 auto;
    justify-content: space-between;
    padding: 0.5em;
    text-align: center;
}

h1{
    text-align: center;
}

p{
    text-align: center;
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
        <h1>Encuentranos aqui</h1>
        <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3035.0205649653403!2d-3.67912062428088!3d40.47481005210291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4229475fc7e749%3A0x71a6fb4707b13a23!2sC.%20Consuegra%2C%203%2C%2028036%20Madrid!5e0!3m2!1ses-419!2ses!4v1695738831270!5m2!1ses-419!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
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