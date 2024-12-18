<?php
session_start();

require '../Controlador/ConectionMySQL.php'; // Conexión PDO

//Verifica el inicio de sesión 
if (!isset($_SESSION['id_cliente'])) {
    $link = "./login_usuario.html";
    $icon = '<i class="fa-solid fa-user users-icon py-2"></i>';
} else {
    $idCliente = $_SESSION['id_cliente'];
    $link = "editUser.php";
    // Consulta para obtener la imagen de perfil del cliente
    $query = "SELECT imagen_perfil FROM clientes WHERE id_cliente = :id_cliente";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_cliente', $idCliente, PDO::PARAM_STR);
    $stmt->execute();

    $imagenPerfil = $stmt->fetchColumn();
    $icon = '<img src="'.$imagenPerfil.'" class="profile-img">';
    // Si no hay imagen de perfil, usa una imagen predeterminada
    if (empty($imagenPerfil)) {
        $icon = '<i class="fa-solid fa-user users-icon py-2"></i>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futbolera</title>
    <link rel="icon" href="./imgs/logo-tienda.webp">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://db.onlinewebfonts.com/c/c0cd6ec8ce6d2bbd315a13b62ed13550?family=AdihausDIN" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #081625;">
        <div class="container-fluid">
            <a class="navbar-brand text-light fw-semibold fs-2" href="./index.php">
                <img src="./imgs/logo-tienda.webp" alt="Shop logo" width="70" height="70"
                    class="d-inline-block align-text-center">
                Futbolera
            </a>
            <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offCanvas" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <section class="offcanvas offcanvas-end" id="offCanvas" tabindex="-1">
                <div clasS="offcanvas-header" data-bs-theme="principal">
                    <h5 class="offcanvas-title fs-1 p-3">Futbolera</h5>
                    <button class="btn-close bg-primary" type="button" aria-label="Close"
                        data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column justify-content-between px-0">
                    <ul class="navbar-nav fs-5 justify-content-evenly">
                        <li class="nav-item p-3 ">
                            <a class="nav-link" href="./novedades.php">Novedades</a>
                        </li>
                        <li class="nav-item p-3 ">
                            <a class="nav-link" href="./Catalogo.php">Catálogo</a>
                        </li>
                        <li class="nav-item p-3 ">
                            <a class="nav-link" href="ofertas.php">Ofertas</a>
                        </li>
                        <li class="nav-item p-3">
                            <a class="nav-link" href="./index.php#contacto">Contacto</a>
                        </li>
                        <div id="notification" class="toast align-items-center text-bg-primary border-0" role="alert"
                            aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    Producto añadido al carrito
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto btn-close-noti"
                                    onclick="closeNotification()" aria-label="Close"></button>
                            </div>
                        </div>
                        <li class="user-buttons d-flex justify-content-evenly p-2 ">
                            <a class="nav-link user-item" id="user-link" href="<?php echo $link; ?>">
                                <?php echo $icon; ?>
                            </a>
                            <a class="nav-link user-item" href="./shop.php">
                                <i class="fa-solid fa-cart-shopping users-icon py-2 px-1"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="d-lg-none align-self-center py-3 d-flex icons-socials">
                        <a href="" class="nav-link">
                            <i class="px-2 py-4  fa-brands fa-facebook-f fa-lg text-center"></i>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=51917096358&text=Quiero%20conocer%20m%C3%A1s%20acerca%20de%20tus%20productos%20waza" class="nav-link">
                            <i class="ps-1 py-4 fa-brands fa-whatsapp fa-lg text-center"></i>
                        </a>
                        <a href="" class="nav-link">
                            <i class="px-2 py-4 fa-brands fa-instagram fa-lg text-center"></i>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </nav>
    <!-- Main -->
    <main class="main-content d-flex position-relative flex-wrap" id="main">
        <!-- Container para subdividir en dos secciones el main -->
        <section class="container d-flex align-items-center justify-content-center container-main col-6 col-md-12">
            <!-- Fila que lleva un pequeño mensaje introduciendo la empresa y que lleva a la sección de catálogo -->
            <div class="row m-2 row-main p-3">
                <!-- Columna que lleva el mensaje y el boton -->
                <div class="col-12 d-flex justify-content-evenly flex-column p-3">
                    <h1 class="text-center main-title animate__animated animate__zoomIn">Empresa líder en Perú para la venta de Camisetas. </h1>
                    <p class=" text-center main-subtitle animate__animated animate__zoomIn">Revisa nuestro amplio catálogo en camisetas de cualquier
                        equipo y cualquier temporada.</p>
                    <a href="./Catalogo.php" class="btn btn-outline-primary align-self-center btn-catalog animate__animated animate__zoomIn">Ir al catálogo!</a>
                </div>
            </div>
        </section>
        <!-- Segunda columna que lleva la imagen principal -->
        <section class="container container-clothes col-md-6 col-12 d-flex p-3">
            <div class="container img-container-main d-flex justify-content-center">
                <img src="./imgs/model.png" alt="T-shirt brand" class="clothe-img-brand animate__animated animate__zoomIn">
            </div>
        </section>
        <!-- Botón de whatsapp fijado siempre a la pantalla -->
        <a href="https://api.whatsapp.com/send?phone=51917096358&text=Quiero%20conocer%20m%C3%A1s%20acerca%20de%20tus%20productos%20waza" class="whatsapp-link" target="_blank">
            <i class="fa-brands fa-whatsapp py-4 whatsapp-icon"></i>
        </a>
    </main>
    <!-- Catalogo Pequeño -->
    <section class="catalog">
        <!-- Contenedor para subdividir el catalogo -->
        <!-- Primera fila que lleva el nombre de la sección y las cartas de equipos peruanos -->
        <div class="container">
            <div class="row">
                <h2 class="subtitle-catalog my-4">Futbol Nacional</h2>
                <!-- Cartas de los equipos peruanos subdividas en 3 columnas y en pantallas pequeños adaptable a solo 2 columnas -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <!-- Ejemplo de producto con formulario para añadir al carrito -->
                    <div class="card">
                        <img src="imgs/catalogo/universitario24.jpg" class="card-img-top img-catalog"
                            alt="Camiseta Universitario">
                        <div class="card-body">
                            <p class="card-text text-center">Camiseta Local Universitario 24/25</p>
                            <h5 class="card-title text-center">S/. 210.00</h5>
                            <form id="addToCartFormP4835080">
                                <input type="hidden" name="product_name" value="Camiseta Local Universitario 24/25">
                                <input type="hidden" name="product_price" value="210.00">
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_id" value="P4835080">
                                <a href="detalles.php?id=P4835080" class="btn btn-primary ms-4 btn-detalles">Ir a detalles</a>
                                <button type="button" class="btn btn-outline-primary btn-cart ms-4 add-to-cart-btn" onclick="addToCart('P4835080')">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img src="imgs/catalogo/alianza.webp" class="card-img-top img-catalog"
                            alt="Camiseta Universitario">
                        <div class="card-body">
                            <p class="card-text text-center">Camiseta Local Alianza Lima 24/25</p>
                            <h5 class="card-title text-center">S/. 240.00</h5>
                            <form id="addToCartFormP9543771">
                                <input type="hidden" name="product_name" value="Camiseta Local Alianza Lima 24/25">
                                <input type="hidden" name="product_price" value="240.00">
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_id" value="P9543771">
                                <a href="detalles.php?id=P9543771" class="btn btn-primary ms-4 btn-detalles">Ir a detalles</a>
                                <button type="button" class="btn btn-outline-primary btn-cart ms-4 add-to-cart-btn" onclick="addToCart('P9543771')">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card">
                        <img src="./imgs/catalogo/cristal.avif" class="card-img-top img-catalog" alt="Camiseta Cristal">
                        <div class="card-body">
                            <p class="card-text text-center">Camiseta Local Sportin Cristal 24/25</p>
                            <h5 class="card-title text-center">S/. 240.00</h5>
                            <form id="addToCartFormP0429812">
                                <input type="hidden" name="product_name" value="Camiseta Local Sportin Cristal 24/25">
                                <input type="hidden" name="product_price" value="240.00">
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_id" value="P0429812">
                                <a href="detalles.php?id=P0429812" class="btn btn-primary ms-4 btn-detalles">Ir a detalles</a>
                                <button type="button" class="btn btn-outline-primary btn-cart ms-4 add-to-cart-btn" onclick="addToCart('P0429812')">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img src="./imgs/catalogo/cusco.jpg" class="card-img-top img-catalog" alt="Camiseta Cusco">
                        <div class="card-body">
                            <p class="card-text text-center">Camiseta Local Cusco 24/25</p>
                            <h5 class="card-title text-center">S/. 240.00</h5>
                            <form id="addToCartFormP2848261">
                                <input type="hidden" name="product_name" value="Camiseta Local Cusco 24/25">
                                <input type="hidden" name="product_price" value="240.00">
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_id" value="P2848261">
                                <a href="detalles.php?id=P2848261" class="btn btn-primary ms-4 btn-detalles">Ir a detalles</a>
                                <button type="button" class="btn btn-outline-primary btn-cart ms-4 add-to-cart-btn" onclick="addToCart('P2848261')">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <h2 class="subtitle-catalog my-4">Camisetas al menor precio</h2>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img src="./imgs/catalogo/chelsea.jpg" class="card-img-top img-catalog" alt="Camiseta Local Chelsea 24/25">
                        <div class="card-body">
                            <p class="card-text text-center">Camiseta Local Chelsea 24/25</p>
                            <h5 class="card-title text-center mb-3">S/. 210.00</h5>
                            <form id="addToCartFormP2016628">
                                <input type="hidden" name="product_name" value="Camiseta Local Chelsea 24/25">
                                <input type="hidden" name="product_price" value="210.00">
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_id" value="P2016628">
                                <a href="detalles.php?id=P2016628" class="btn btn-primary ms-4 btn-detalles">Ir a detalles</a>
                                <button class="btn btn-outline-primary btn-cart ms-4" onclick="addToCart('P2016628')">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img src="./imgs/catalogo/mun.avif" class="card-img-top img-catalog" alt="Camiseta Local Man. United 24/25">
                        <div class="card-body">
                            <p class="card-text text-center">Camiseta Local Man. United 24/25</p>
                            <h5 class="card-title text-center mb-3">S/. 240.00</h5>
                            <form id="addToCartFormP9641081">
                                <input type="hidden" name="product_name" value="Camiseta Local Man. United 24/25">
                                <input type="hidden" name="product_price" value="240.00">
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_id" value="P9641081">
                                <a href="detalles.php?id=P9641081" class="btn btn-primary ms-4 btn-detalles">Ir a detalles</a>
                                <button class="btn btn-outline-primary btn-cart ms-4" onclick="addToCart('P9641081')">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img src="./imgs/catalogo/dortmund.jpg" class="card-img-top img-catalog" alt="Camiseta Local Bor. Dortmund 24/25">
                        <div class="card-body">
                            <p class="card-text text-center">Camiseta Local Bor. Dortmund 24/25</p>
                            <h5 class="card-title text-center mb-3">S/. 240.00</h5>
                            <form id="addToCartFormP8448469">
                                <input type="hidden" name="product_name" value="Camiseta Local Bor. Dortmund 24/25">
                                <input type="hidden" name="product_price" value="240.00">
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_id" value="P8448469">
                                <a href="detalles.php?id=P8448469" class="btn btn-primary ms-4 btn-detalles">Ir a detalles</a>
                                <button class="btn btn-outline-primary btn-cart ms-4" onclick="addToCart('P8448469')">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img src="./imgs/catalogo/boca.jpg" class="card-img-top img-catalog" alt="Camiseta Local Boca Juniors 24/25">
                        <div class="card-body">
                            <p class="card-text text-center">Camiseta Local Boca Juniors 24/25</p>
                            <h5 class="card-title text-center mb-3">S/. 240.00</h5>
                            <form id="addToCartFormP6389611">
                                <input type="hidden" name="product_name" value="Camiseta Local Boca Juniors 24/25">
                                <input type="hidden" name="product_price" value="240.00">
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_id" value="P6389611">
                                <a href="detalles.php?id=P6389611" class="btn btn-primary ms-4 btn-detalles">Ir a detalles</a>
                                <button class="btn btn-outline-primary btn-cart ms-4" onclick="addToCart('P6389611')">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Galería de imagenes -->
    <section class="galeria" id="galeria">
        <h3 class="galeria-titulo mt-5 ms-5 mt-md-5 ms-md-4">
            Todo del fútbol, en un solo lugar
        </h3>
        <div id="carouselExampleCaptions" class="carousel slide carrusel-galeria" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./imgs/slider-home/barcelona.webp" class="d-block carrusel-img" alt="Barcelona Kit 24/25">
                    <div class="img-caption d-block w-100 d-flex">
                        <p class="img-msg">Força Barça!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./imgs/slider-home/rm.webp" class="d-block w-100 carrusel-img"
                        alt="Real Madrid Kit 24/25">
                    <div class="img-caption d-block w-100 d-flex">
                        <p class="img-msg">Hala Madrid!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./imgs/slider-home/milan.webp" class="d-block w-100 carrusel-img" alt="Milan Kit 24/25">
                    <div class="img-caption d-block w-100 d-flex">
                        <p class="img-msg">Sempre Milan</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./imgs/slider-home/munit.webp" class="d-block w-100 carrusel-img"
                        alt="Man. United Kit 24/25">
                    <div class="img-caption d-block w-100 d-flex">
                        <p class="img-msg">Sé un Red Devil</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./imgs/slider-home/inter.webp" class="d-block w-100 carrusel-img" alt="Inter Kit 24/25">
                    <div class="img-caption d-block w-100 d-flex">
                        <p class="img-msg">Orgullo Nerazzurri!</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
        <div id="carouselRopas" class="carousel slide carrusel-galeria" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./imgs/slider-home/casaca-mun.avif" class="d-block carrusel-img"
                        alt="Barcelona Kit 24/25">
                    <div class="img-caption d-block w-100 d-flex">
                        <p class="img-msg">Todo en casacas y buzos</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./imgs/slider-home/mujer-alemania.avif" class="d-block w-100 carrusel-img"
                        alt="Real Madrid Kit 24/25">
                    <div class="img-caption d-block w-100 d-flex">
                        <p class="img-msg">Para nuestras jugadoras</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./imgs/slider-home/niños-liverpool.webp" class="d-block w-100 carrusel-img"
                        alt="Milan Kit 24/25">
                    <div class="img-caption d-block w-100 d-flex">
                        <p class="img-msg">Para los pequeños</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./imgs/slider-home/chimpun.jpg" class="d-block w-100 carrusel-img"
                        alt="Man. United Kit 24/25">
                    <div class="img-caption d-block w-100 d-flex">
                        <p class="img-msg">Todo en Chimpunes</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./imgs/slider-home/chimpunes-puma.avif" class="d-block w-100 carrusel-img"
                        alt="Inter Kit 24/25">
                    <div class="img-caption d-block w-100 d-flex">
                        <p class="img-msg">Chimpunes sin tacos</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselRopas" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselRopas" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>
    <!-- Formulario de contacto -->
    <section class="form-contacto" id="contacto">
        <h2 class="text-center my-5 my-md-3 form-title">¿Quieres hacernos una consulta?</h2>
        <div class="form-container">
            <!-- Aca se pondra el correo a donde se enviará -->
            <form action="https://formsubmit.co/futboleraoficialsenati@gmail.com" method="post" class="contact-form">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="6" required style="resize: none;"></textarea>
                </div>
                <button type="submit" name="enviar" class="btn btn-primary btn-form">Enviar</button>
                <!-- Algunos inputs para evitar redirecciones y captchas -->
                <!-- Aca debemos poner una pagina de redireccion en el value xd -->
                <input type="hidden" name="_next" value="http://localhost/soccer-clothing.io/Vista/index.php">
                <!-- Que no funcione el captcha -->
                <input type="hidden" name="_captcha" value="false">
            </form>
        </div>
    </section>
    <!-- Pie de pagina / Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-seccion contact-info">
                    <h4 class="footer-title">Método de Contacto</h4>
                    <ul class="footer-list">
                        <li class="footer-info"><strong>Email:</strong> contacto@futbolera.com</li>
                        <li class="footer-info"><strong>Teléfono:</strong> +51 234 567 890</li>
                        <li class="footer-info"><strong>Dirección:</strong> Calle Francisco Cabrera 123, Chiclayo, Perú
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 footer-seccion links-footer">
                    <h4 class="footer-title">Síguenos</h4>
                    <ul class="footer-list social-media">
                        <li><a class="footer-link" href="#" target="_blank">
                                <i class="fa-brands fa-facebook fa-2xl"> </i>
                                Futbolera.pe
                            </a></li>
                        <li><a class="footer-link" href="#" target="_blank">
                                <i class="fa-brands fa-instagram fa-2xl"></i>
                                Futbolera.pe
                            </a></li>
                        <li><a class="footer-link" href="#" target="_blank">
                                <i class="fa-brands fa-x-twitter fa-2xl"></i>
                                Futbolera.pe
                            </a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-seccion">
                    <h4 class="footer-title">Sobre Nosotros</h4>
                    <ul class="footer-list">
                        <li><a class="footer-link" href="#">Quiénes Somos</a></li>
                        <li><a class="footer-link" href="#">Formas de Pago</a></li>
                        <li><a class="footer-link" href="#">Guía de tallas</a></li>
                        <li><a class="footer-link" href="#">Cambios y Devoluciones</a></li>
                        <li><a class="footer-link" href="#">Preguntas Frecuentes (FAQ)</a></li>
                        <li><a class="footer-link" href="#">Términos y condiciones</a></li>
                        <li><a class="footer-link" href="#">Política de privacidad</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copy">
            <p>&copy; 2024 Futbolera. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="carAlert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>