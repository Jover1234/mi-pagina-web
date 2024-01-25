<?php
// Configuración de la base de datos
$server = 'localhost';
$username = 'root';
$password = '1234';
$database = 'intermedia3';
 // Conecta con base de datos
 try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  } catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
  }

  // Variables para almacenar el carrito y el total
$carrito = [];
$total = 0;

// Función para agregar un producto al carrito
function agregarAlCarrito($nombre, $precio) {
    global $conn;

    // Añadir el producto al carrito en la base de datos
    $stmt = $conn->prepare('INSERT INTO carrito (nombre, precio) VALUES (?, ?)');
    $stmt->execute([$nombre, $precio]);
}

// Función para obtener los productos del carrito desde la base de datos
function obtenerCarrito() {
    global $conn;
    $stmt = $conn->query('SELECT * FROM carrito');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Obtener el carrito al cargar la página
$carrito = obtenerCarrito();

$miConsulta = $conn->prepare('SELECT * FROM carrito;');
// Ejecuta consulta
$miConsulta->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="TiendaStyles.css">
</head>
<body>
<?php
// Si se envía el formulario, agregar el producto al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    agregarAlCarrito($nombre, $precio);

    // Obtener el carrito actualizado desde la base de datos
    $carrito = obtenerCarrito();
}
?>
 <header>
        <div class="navbar">
        <a href="Cerrar Sesion.php"> cerrar Sesion</a>
            <a href="inicio.php">Inicio</a>
            <a href="Tienda.php">Tienda</a>
            <a href="AtencionCliente.php">Atención al cliente</a>
            <a href="leer.php">Reseñas</a>
            <a href="Carrito.php">Carrito</a>
        </div>
        <style>
            html{
    font-family: Arial, Helvetica, sans-serif;
}

a{
    text-decoration:none;
    color:black;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.cart {
    text-align: center;
    height: 20em;
    margin-top: 14em;
    border: 1px solid #333;
    padding: 10px;
}

.navbar{
    background-color:green;
    height: 2.5em;
    display:flex;
    margin-bottom: 0em;
}

.navbar a{
    display:flex;
    color: white;
    margin:auto;
    justify-content: space-between;
    padding: 0.5em;
    text-align: center;
}

.EnunciadoComidas{
    font-size: 2.5em;
    margin-bottom: -1em;
}

.Comidas1{
    display:flex;
    text-align: center;
    justify-content: space-between;
    height: 20em;
    width: 100%;
}

.Comidas1 img{
    position: relative;
    text-align: center;
    size: 3.5em;
    display:flex;
    margin:auto;
    width: 100%;
    
}

.Comidas2{
    display:flex;
    text-align: center;
    height: 18em;
    margin-top: 9em;
}

.Comidas2 img{
    position: relative;
    text-align: center;
    display:flex;
    margin-right:6em;
    margin-left: 4em;
    
}

.EnunciadoCamas{
    font-size: 2.5em;
    size: 2.5em;
    margin-top: 3em;
    margin-bottom: -1.55em;
}

.Camas{
    display:flex;
    text-align: center;
    height: 20em;
}

.Camas img{
    position: relative;
    text-align: center;
    size: 3.5em;
    display:flex;
    margin:auto;
    
}

.EnunciadoJuguetes{
    font-size: 2.5em;
    size: 2.5em;
    margin-top: 3em;
}

.Juguetes{
    display:flex;
    text-align: center;
    justify-content:space-between;
    height: 17em;
}

.Juguetes img{
    position: relative;
    text-align: center;
    size: 3.5em;
    display:flex;
    margin:auto;
    
}

.EnunciadoTerrarios{
    font-size: 2.5em;
    size: 2.5em;
    margin-top: 3em;
}

.Terrarios{
    display:flex;
    text-align: center;
    height: 17em;
}

.Terrarios img{
    position: relative;
    text-align: center;
    size: 3.5em;
    display:flex;
    margin: auto;
    
}

.Terrarios h3{
    margin: 1em;
    font-size: 1em;
}

.EnunciadoAcuarios{
    font-size: 2.5em;
    size: 2.5em;
    margin-top: 3em;
}

.Acuarios{
    display:flex;
    text-align: center;
    height: 16em;
}

.Acuarios img{
    position: relative;
    text-align: center;
    display:flex;
    margin: auto;
    
}

.EnunciadoJaulas{
    font-size: 2.5em;
    size: 2.5em;
    margin-top: 3em;
}

.Jaulas{
    display:flex;
    text-align: center;
    height: 17em;
}

.Jaulas img{
    position: relative;
    text-align: center;
    size: 3.5em;
    display:flex;
    margin: auto;
    
}

.Jaulas h3{
    margin: 1em;
    font-size: 1em;
}

.EnunciadoPerros{
    font-size: 2.5em;
    size: 2.5em;
    margin-top: 3em;
}

.Perros{
    display:flex;
    text-align: center;
    height: 17em;
}

.Perros img{
    position: relative;
    text-align: center;
    size: 3.5em;
    display:flex;
    margin: auto;
    
}

.EnunciadoGatos{
    font-size: 2.5em;
    size: 2.5em;
    margin-top: 3em;
}

.Gatos{
    display:flex;
    text-align: center;
    height: 20em;
}

.Gatos img{
    position: relative;
    text-align: center;
    size: 3.5em;
    display:flex;
    margin: auto;
    
}

.EnunciadoRoedores{
    font-size: 2.5em;
    size: 2.5em;
    margin-top: 3em;
}

.Roedores{
    display:flex;
    text-align: center;
    height: 17em;
}

.Roedores img{
    position: relative;
    text-align: center;
    size: 3.5em;
    display:flex;
    margin: auto;
    
}

.EnunciadoPeces{
    font-size: 2.5em;
    size: 2.5em;
    margin-top: 3em;
}

.Peces{
    display:flex;
    text-align: center;
    height: 17em;
}

.Peces img{
    position: relative;
    text-align: center;
    size: 3.5em;
    display:flex;
    margin: auto;
    
}

.EnunciadoAves{
    font-size: 2.5em;
    size: 2.5em;
    margin-top: 3em;
}

.Aves{
    display:flex;
    text-align: center;
    height: 20em;
}

.Aves img{
    position: relative;
    text-align: center;
    size: 3.5em;
    display:flex;
    margin: auto;
    
}

.Aves h3{
    margin: 1em;
}

.EnunciadoReptiles{
    font-size: 2.5em;
    size: 2.5em;
    margin-top: 3em;
}

.Reptiles{
    display:flex;
    text-align: center;
    height: 20em;
    margin-bottom: 10em;
}

.Reptiles img{
    position: relative;
    text-align: center;
    size: 3.5em;
    display:flex;
    margin: auto;
    
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
    </header>    
    <main>
        <section class="EnunciadoComidas">
            <h2>Comidas</h2>
        </section>
        <section class="Comidas1">
            <article>
                <img src="imagenes/ComidaPerro1.jpg" height="100%">
                <h3>Nath Puppy Mini Pollo pienso para perros</h3>
                <a href="tienda.html">29.95 €</a>
                <form method="post">
        <input type="hidden" name="nombre" value="Nath Puppy Mini Pollo pienso para perros">
        <input type="hidden" name="precio" value="29.95">
        <button type="submit">Agregar al Carrito</button>
    </form>
                </div>
            </article>
            <article>
                <img src="imagenes/ComidaPerro2.jpg" height="100%">
                <h3>Nath Adult Mini Pollo pienso para perros</h3>
                <a href="tienda.html">29.95 €</a>
                <form method="post">
        <input type="hidden" name="nombre" value="ath Adult Mini Pollo pienso para perros">
        <input type="hidden" name="precio" value="29.95">
        <button type="submit">Agregar al Carrito</button>
    </form>
                </div>
            </article>
            <article>
                <img src="imagenes/ComidaGato.webp" height="100%">
                <h3>Nath Adult Sterilised Pollo y Arroz pienso para gatos</h3>
                <a href="tienda.html">42.99 €</a>
                <form method="post">
        <input type="hidden" name="nombre" value="Nath Adult Sterilised Pollo y Arroz pienso para gatos">
        <input type="hidden" name="precio" value="42.99">
        <button type="submit">Agregar al Carrito</button>
    </form>
    </article>

<article>
    <img src="imagenes/ComidaRoedores.jpg" height="100%">
    <h3>Little One Alimento Degús</h3>
    <a href="tienda.html">2.70 €</a>
    <form method="post" onsubmit="return agregarAlCarrito('Little One Alimento Degús', 2.70)">
        <input type="hidden" name="nombre" value="Little One Alimento Degús">
        <input type="hidden" name="precio" value="2.70">
        <button type="submit">AÑADIR AL CARRITO</button>
    </form>
</article>

<article>
    <img src="imagenes/ComidaPeces.jpg" height="100%">
    <h3>Tetra Goldfish Food 52 G</h3>
    <a href="tienda.html">42.99 €</a>
    <form method="post" onsubmit="return agregarAlCarrito('Tetra Goldfish Food 52 G', 42.99)">
        <input type="hidden" name="nombre" value="Tetra Goldfish Food 52 G">
        <input type="hidden" name="precio" value="42.99">
        <button type="submit">AÑADIR AL CARRITO</button>
    </form>
</article>
</section>

<section class="Comidas2">
    <article>
        <img src="imagenes/ComidaAves.jpg" height="100%" width="100%">
        <h3>Psittacus Pienso Mini</h3>
        <a href="tienda.html">5.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Psittacus Pienso Mini', 5.99)">
            <input type="hidden" name="nombre" value="Psittacus Pienso Mini">
            <input type="hidden" name="precio" value="5.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>

    <article>
        <img src="imagenes/ComidaReptiles.jpg" height="100%">
        <h3>Tropical Reptil Soft Carnivoros</h3>
        <a href="tienda.html">9.29 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Tropical Reptil Soft Carnivoros', 9.29)">
            <input type="hidden" name="nombre" value="Tropical Reptil Soft Carnivoros">
            <input type="hidden" name="precio" value="9.29">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
</section>

<section class="EnunciadoCamas">
    <h2>Camas</h2>
</section>

<section class="Camas">
    <article>
        <img src="imagenes/Camas1.webp" height="100%">
        <h3>Catshion Twin Cama para gatos</h3>
        <a href="tienda.html">16.96 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Catshion Twin Cama para gatos', 16.96)">
            <input type="hidden" name="nombre" value="Catshion Twin Cama para gatos">
            <input type="hidden" name="precio" value="16.96">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>

    <article>
        <img src="imagenes/Camas2.webp" height="100%">
        <h3>Dogzz Basic Amore Sueño Cama Para Perros</h3>
        <a href="tienda.html">21.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Dogzz Basic Amore Sueño Cama Para Perros', 21.99)">
            <input type="hidden" name="nombre" value="Dogzz Basic Amore Sueño Cama Para Perros">
            <input type="hidden" name="precio" value="21.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
</section>

<section class="EnunciadoJuguetes">
    <h2>Juguetes</h2>
</section>

<section class="Juguetes">
    <article>
        <img src="imagenes/Juguetes1.webp" height="100%">
        <h3>Play&Bite Squeaky pelotas de tenis con sonido</h3>
        <a href="tienda.html">3.90€</a>
        <form method="post" onsubmit="return agregarAlCarrito('Play&Bite Squeaky pelotas de tenis con sonido', 3.90)">
            <input type="hidden" name="nombre" value="Play&Bite Squeaky pelotas de tenis con sonido">
            <input type="hidden" name="precio" value="3.90">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
    <img src="imagenes/Juguetes2.webp" height="100%">
    <h3>The Cat Band Caña con plumas</h3>
    <a href="tienda.html">3.99 €</a>
    <form method="post" onsubmit="return agregarAlCarrito('The Cat Band Caña con plumas', 3.99)">
        <input type="hidden" name="nombre" value="The Cat Band Caña con plumas">
        <input type="hidden" name="precio" value="3.99">
        <button type="submit">AÑADIR AL CARRITO</button>
    </form>
</article>

<article>
    <img src="imagenes/Juguetes3.webp" height="100%">
    <h3>Sandimas Deco Coral Rosa-Blanco</h3>
    <a href="tienda.html">3.99 €</a>
    <form method="post" onsubmit="return agregarAlCarrito('Sandimas Deco Coral Rosa-Blanco', 3.99)">
        <input type="hidden" name="nombre" value="Sandimas Deco Coral Rosa-Blanco">
        <input type="hidden" name="precio" value="3.99">
        <button type="submit">AÑADIR AL CARRITO</button>
    </form>
</article>

<article>
    <img src="imagenes/Juguetes4.webp" height="100%">
    <h3>Flamingo Bogie Rueda De Plástico Para Roedores</h3>
    <a href="tienda.html">16.39 €</a>
    <form method="post" onsubmit="return agregarAlCarrito('Flamingo Bogie Rueda De Plástico Para Roedores', 16.39)">
        <input type="hidden" name="nombre" value="Flamingo Bogie Rueda De Plástico Para Roedores">
        <input type="hidden" name="precio" value="16.39">
        <button type="submit">AÑADIR AL CARRITO</button>
    </form>
</article>

<article>
    <img src="imagenes/Juguetes5.webp" height="100%">
    <h3>Flamingo Parque De Juego Para Periquitos</h3>
    <a href="tienda.html">18.99 €</a>
    <form method="post" onsubmit="return agregarAlCarrito('Flamingo Parque De Juego Para Periquitos', 18.99)">
        <input type="hidden" name="nombre" value="Flamingo Parque De Juego Para Periquitos">
        <input type="hidden" name="precio" value="18.99">
        <button type="submit">AÑADIR AL CARRITO</button>
    </form>
</article>
</section>

<section class="EnunciadoTerrarios">
    <h2>Terrarios</h2>
</section>

<section class="Terrarios">
    <article>
        <img src="imagenes/Terrarios1.webp" height="100%">
        <h3>Zoo Med Reptibreezee Terrario De Mallla Metalica </h3>
        <a href="tienda.html">106.90 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Zoo Med Reptibreezee Terrario De Mallla Metalica', 106.90)">
            <input type="hidden" name="nombre" value="Zoo Med Reptibreezee Terrario De Mallla Metalica">
            <input type="hidden" name="precio" value="106.90">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>

    <article>
        <img src="imagenes/Terrarios2.jpg" height="100%">
        <h3>IsoTarrium Basic, Terrario de PVC, Lucky reptile.</h3>
        <a href="tienda.html">201.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('IsoTarrium Basic, Terrario de PVC, Lucky reptile.', 201.99)">
            <input type="hidden" name="nombre" value="IsoTarrium Basic, Terrario de PVC, Lucky reptile.">
            <input type="hidden" name="precio" value="201.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
</section>

<section class="EnunciadoAcuarios">
    <h2>Acuarios</h2>
</section>

<section class="Acuarios">
    <article>
        <img src="imagenes/Acuario3.jpg" height="100%">
        <h3>Acuario Juwel Primo 110 LED</h3>
        <a href="tienda.html">221.90 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Acuario Juwel Primo 110 LED', 221.90)">
            <input type="hidden" name="nombre" value="Acuario Juwel Primo 110 LED">
            <input type="hidden" name="precio" value="221.90">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>

    <article>
        <img src="imagenes/Acuario2.jpg" height="100%">
        <h3>Kit Acuario Aqualed 64 Litros.</h3>
        <a href="tienda.html">99.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Kit Acuario Aqualed 64 Litros', 99.99)">
            <input type="hidden" name="nombre" value="Kit Acuario Aqualed 64 Litros">
            <input type="hidden" name="precio" value="99.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
</section>
<section class="EnunciadoJaulas">
    <h2>Jaulas</h2>
</section>

<section class="Jaulas">
    <article>
        <img src="imagenes/Jaulas1.webp" height="100%">
        <h3>Jaula 266 Gris Voltregá</h3>
        <a href="tienda.html">129.00 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Jaula 266 Gris Voltregá', 129.00)">
            <input type="hidden" name="nombre" value="Jaula 266 Gris Voltregá">
            <input type="hidden" name="precio" value="129.00">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>

    <article>
        <img src="imagenes/Jaulas2.webp" height="100%">
        <h3>VOLTREGA Pajarera 430 Oliva Crema</h3>
        <a href="tienda.html">113.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('VOLTREGA Pajarera 430 Oliva Crema', 113.99)">
            <input type="hidden" name="nombre" value="VOLTREGA Pajarera 430 Oliva Crema">
            <input type="hidden" name="precio" value="113.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>

    <article>
        <img src="imagenes/Jaulas3.webp" height="100%">
        <h3>ICA 60 JAULA GIGANTE CON NIVELES PARA HURONES</h3>
        <a href="tienda.html">224.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('ICA 60 JAULA GIGANTE CON NIVELES PARA HURONES', 224.99)">
            <input type="hidden" name="nombre" value="ICA 60 JAULA GIGANTE CON NIVELES PARA HURONES">
            <input type="hidden" name="precio" value="224.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
</section>

<section class="EnunciadoPerros">
    <h2>Perros</h2>
</section>

<section class="Perros">
    <article>
        <img src="imagenes/ComidaPerro1.jpg" height="100%">
        <h3>Nath Puppy Mini Pollo pienso para perros</h3>
        <a href="tienda.html">29.95 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Nath Puppy Mini Pollo pienso para perros', 29.95)">
            <input type="hidden" name="nombre" value="Nath Puppy Mini Pollo pienso para perros">
            <input type="hidden" name="precio" value="29.95">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>

    <article>
        <img src="imagenes/ComidaPerro2.jpg" height="100%">
        <h3>Nath Adult Mini Pollo pienso para perros</h3>
        <a href="tienda.html">29.95 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Nath Adult Mini Pollo pienso para perros', 29.95)">
            <input type="hidden" name="nombre" value="Nath Adult Mini Pollo pienso para perros">
            <input type="hidden" name="precio" value="29.95">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>

    <article>
        <img src="imagenes/Camas2.webp" height="100%">
        <h3>Dogzz Basic Amore Sueño Cama Para Perros</h3>
        <a href="tienda.html">21.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Dogzz Basic Amore Sueño Cama Para Perros', 21.99)">
            <input type="hidden" name="nombre" value="Dogzz Basic Amore Sueño Cama Para Perros">
            <input type="hidden" name="precio" value="21.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>

    <article>
        <img src="imagenes/Juguetes1.webp" height="100%" width="100%">
        <h3>Play&Bite Squeaky pelotas de tenis con sonido</h3>
        <a href="tienda.html">3.90 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Play&Bite Squeaky pelotas de tenis con sonido', 3.90)">
            <input type="hidden" name="nombre" value="Play&Bite Squeaky pelotas de tenis con sonido">
            <input type="hidden" name="precio" value="3.90">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
</section>

<section class="EnunciadoGatos">
    <h2>Gatos</h2>
</section>
<section class="Gatos">
    <article>
        <img src="imagenes/ComidaGato.webp" height="100%" width="100%">
        <h3>Nath Adult Sterilised Pollo y Arroz pienso para gatos</h3>
        <a href="tienda.html">42.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Nath Adult Sterilised Pollo y Arroz pienso para gatos', 42.99)">
            <input type="hidden" name="nombre" value="Nath Adult Sterilised Pollo y Arroz pienso para gatos">
            <input type="hidden" name="precio" value="42.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Camas1.webp" height="100%" width="100%">
        <h3>Catshion Twin Cama para gatos</h3>
        <a href="tienda.html">16.96 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Catshion Twin Cama para gato', 16.96)">
            <input type="hidden" name="nombre" value="Catshion Twin Cama para gato">
            <input type="hidden" name="precio" value="16.96">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Juguetes2.webp" height="100%" width="100%">
        <h3>The Cat Band Caña con plumas</h3>
        <a href="tienda.html">3.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('The Cat Band Caña con plumas', 3.99)">
            <input type="hidden" name="nombre" value="The Cat Band Caña con plumas">
            <input type="hidden" name="precio" value="3.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
</section>
<section class="EnunciadoRoedores">
    <h2>Roedores</h2>
</section>
<section class="Roedores">
    <article>
        <img src="imagenes/ComidaRoedores.jpg" height="100%" width="100%">
        <h3>Little One Alimento Degús</h3>
        <a href="tienda.html">2.70 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Little One Alimento Degús', 2.70)">
            <input type="hidden" name="nombre" value="Little One Alimento Degús">
            <input type="hidden" name="precio" value="2.70">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Juguetes4.webp" height="100%" width="100%">
        <h3>FLAMINGO BOGIE RUEDA DE PLÁSTICO PARA ROEDORES</h3>
        <a href="tienda.html">16.39 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('FLAMINGO BOGIE RUEDA DE PLÁSTICO PARA ROEDORES', 16.39)">
            <input type="hidden" name="nombre" value="FLAMINGO BOGIE RUEDA DE PLÁSTICO PARA ROEDORES">
            <input type="hidden" name="precio" value="16.39">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Jaulas3.webp" height="100%" width="100%">
        <h3>ICA 60 JAULA GIGANTE CON NIVELES PARA HURONES</h3>
        <a href="tienda.html">224.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('ICA 60 JAULA GIGANTE CON NIVELES PARA HURONES', 224.99)">
            <input type="hidden" name="nombre" value="ICA 60 JAULA GIGANTE CON NIVELES PARA HURONES">
            <input type="hidden" name="precio" value="224.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Jaulas1.webp" height="100%" width="100%">
        <h3>Jaula 266 Gris Voltregá</h3>
        <a href="tienda.html">129.00 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Jaula 266 Gris Voltregá', 129.00)">
            <input type="hidden" name="nombre" value="Jaula 266 Gris Voltregá">
            <input type="hidden" name="precio" value="129.00">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
</section>
<section class="EnunciadoPeces">
    <h2>Peces</h2>
</section>
<section class="Peces">
    <article>
        <img src="imagenes/ComidaPeces.jpg" height="100%" width="100%">
        <h3>Tetra Goldfish Food 52 G</h3>
        <a href="tienda.html">42.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Tetra Goldfish Food 52 G', 42.99)">
            <input type="hidden" name="nombre" value="Tetra Goldfish Food 52 G">
            <input type="hidden" name="precio" value="42.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Juguetes3.webp" height="100%" width="100%">
        <h3>Sandimas Deco Coral Rosa-Blanco</h3>
        <a href="tienda.html">3.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Sandimas Deco Coral Rosa-Blanco', 3.99)">
            <input type="hidden" name="nombre" value="Sandimas Deco Coral Rosa-Blanco">
            <input type="hidden" name="precio" value="3.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Acuario2.jpg" height="100%" width="100%">
        <h3>Kit Acuario Aqualed 64 Litros.</h3>
        <a href="tienda.html">99.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Kit Acuario Aqualed 64 Litros', 99.99)">
            <input type="hidden" name="nombre" value="Kit Acuario Aqualed 64 Litros">
            <input type="hidden" name="precio" value="99.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Acuario3.jpg" height="100%" width="100%">
        <h3>Acuario Juwel Primo 110 LED</h3>
        <a href="tienda.html">221.90 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Acuario Juwel Primo 110 LED', 221.90)">
            <input type="hidden" name="nombre" value="Acuario Juwel Primo 110 LED">
            <input type="hidden" name="precio" value="221.90">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
</section>
<section class="EnunciadoAves">
    <h2>Aves</h2>
</section>
<section class="Aves">
    <article>
        <img src="imagenes/ComidaAves.jpg" height="100%" width="100%">
        <h3>Psittacus Pienso Mini</h3>
        <a href="tienda.html">5.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Psittacus Pienso Mini', 5.99)">
            <input type="hidden" name="nombre" value="Psittacus Pienso Mini">
            <input type="hidden" name="precio" value="5.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Juguetes5.webp" height="100%" width="100%">
        <h3>Flamingo Parque De Juego Para Periquitos</h3>
        <a href="tienda.html">18.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Flamingo Parque De Juego Para Periquitos', 18.99)">
            <input type="hidden" name="nombre" value="Flamingo Parque De Juego Para Periquitos">
            <input type="hidden" name="precio" value="18.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Jaulas2.webp" height="100%" width="100%">
        <h3>Voltregá Pajarera 430 Oliva Crema</h3>
        <a href="tienda.html">113.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Voltregá Pajarera 430 Oliva Crema', 113.99)">
            <input type="hidden" name="nombre" value="Voltregá Pajarera 430 Oliva Crema">
            <input type="hidden" name="precio" value="113.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
</section>
<section class="EnunciadoReptiles">
    <h2>Reptiles</h2>
</section>
<section class="Reptiles">
    <article>
        <img src="imagenes/ComidaReptiles.jpg" height="100%" width="100%">
        <h3>Tropical Reptil Soft Carnivoros</h3>
        <a href="tienda.html">9.29 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('Tropical Reptil Soft Carnivoros', 9.29)">
            <input type="hidden" name="nombre" value="Tropical Reptil Soft Carnivoros">
            <input type="hidden" name="precio" value="9.29">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Terrarios1.webp" height="100%" width="100%">
        <h3>ZOO MED REPTIBREEZE TERRARIO DE MALLA METÁLICA</h3>
        <a href="tienda.html">106.90 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('ZOO MED REPTIBREEZE TERRARIO DE MALLA METÁLICA', 106.90)">
            <input type="hidden" name="nombre" value="ZOO MED REPTIBREEZE TERRARIO DE MALLA METÁLICA">
            <input type="hidden" name="precio" value="106.90">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Terrarios2.jpg" height="100%" width="100%">
        <h3>IsoTarrium Basic, Terrario de PVC, Lucky reptile.</h3>
        <a href="tienda.html">201.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('IsoTarrium Basic, Terrario de PVC, Lucky reptile', 201.99)">
            <input type="hidden" name="nombre" value="IsoTarrium Basic, Terrario de PVC, Lucky reptile">
            <input type="hidden" name="precio" value="201.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
    <article>
        <img src="imagenes/Terrarios3.jpg" height="100%" width="100%">
        <h3>tanque de reptiles de 12 x 8 x 6.5 pulgadas con ventilación</h3>
        <a href="tienda.html">35.99 €</a>
        <form method="post" onsubmit="return agregarAlCarrito('tanque de reptiles de 12 x 8 x 6.5 pulgadas con ventilación', 35.99)">
            <input type="hidden" name="nombre" value="tanque de reptiles de 12 x 8 x 6.5 pulgadas con ventilación">
            <input type="hidden" name="precio" value="35.99">
            <button type="submit">AÑADIR AL CARRITO</button>
        </form>
    </article>
</section>
<footer>
        <div class=" final">
            <a href="PoliticaPrivacidad.php">Poltica de Privacidad</a>
            <a href="Cookies.php">Cookies</a>
            <a href="Conocenos.php">Quienes Somos</a>
            <a href="Ubicaciones.php">Ubicacion</a>
    </footer>
</html>
    

