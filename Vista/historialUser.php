


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futbolera</title>
    <link rel="icon" href="./imgs/logo-tienda.webp">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #081625;">
        <div class="container-fluid">
            <a class="navbar-brand text-light fw-semibold fs-2" href="./index.html">
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
                            <a class="nav-link" href="./novedades.html">Novedades</a>
                        </li>
                        <li class="nav-item p-3 ">
                            <a class="nav-link" href="./Catalogo.php">Catálogo</a>
                        </li>
                        <li class="nav-item p-3 ">
                            <a class="nav-link" href="ofertas.php">Ofertas</a>
                        </li>
                        <li class="nav-item p-3">
                            <a class="nav-link" href="./index.html#contacto">Contacto</a>
                        </li>
                        <li class="user-buttons d-flex justify-content-evenly p-2 ">
                            <a class="nav-link user-item" href="./login_usuario.html">
                                <i class="fa-solid fa-user users-icon py-2"></i>
                            </a>
                            <a class="nav-link user-item" href="#">
                                <i class="fa-solid fa-cart-shopping users-icon py-2 px-1"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="d-lg-none align-self-center py-3 d-flex icons-socials">
                        <a href="" class="nav-link">
                            <i class="px-2 py-4  fa-brands fa-facebook-f fa-lg text-center"></i>
                        </a>
                        <a href="" class="nav-link">
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
<!-- Main page content-->
<main class="pt-5">
    <div class="container-xl px-4 mt-4 pt-5">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link ms-0" href="./editUser.php">Perfil</a>
            <a class="nav-link active" href="./historialUser.php">Historial</a>
        </nav>
        <hr class="mt-0 mb-4" />
    
        <!-- Historial de compras-->
        <div class="card mb-4">
            <div class="card-header">Historial de compras</div>
            <div class="card-body p-0">
                <!-- Billing history table-->
                <div class="table-responsive table-billing-history">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-gray-200" scope="col">Nombre</th>
                                <th class="border-gray-200" scope="col">Fecha</th>
                                <th class="border-gray-200" scope="col">N°Compra</th>
                                <th class="border-gray-200" scope="col">Detalles</th>
                                <th class="border-gray-200" scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Aca el nombre</td>
                                <td>Aca la fecha</td>
                                <td>Compra 100</td>
                                <td><button class="badge bg-success border-1 px-3">Ver</button></td>
                                <td>S/. 100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>