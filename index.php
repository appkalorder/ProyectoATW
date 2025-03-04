<?php
session_start();
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DocuLab</title>
    <link rel="shortcut icon" href="svg/Dsvg.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<style>
    a {
        text-decoration: none;
    }

    .nosotros {
        text-align: justify;
        line-height: 2em;
    }

    .card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .card-img-top {
        max-height: 200px;
        object-fit: cover;
    }

    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .nav-link {
        color: black;
    }

    .fondo {
        background-color: #f0f0f0;
    }

    .color-btn:hover {
        background-color: #d1d1d1;
        color: black;
    }
</style>

<script>
    $(document).ready(function() {
        function isInViewport(element) {
            const elementTop = $(element).offset().top;
            const elementBottom = elementTop + $(element).outerHeight();
            const viewportTop = $(window).scrollTop();
            const viewportBottom = viewportTop + $(window).height();
            return elementBottom > viewportTop && elementTop < viewportBottom;
        }

        function checkVisibility() {
            $(".card").each(function() {
                if (isInViewport(this)) {
                    $(this).stop().fadeIn(500); // Cambia esto por animate si quieres algo más específico
                } else {
                    $(this).stop().fadeOut(500);
                }
            });
        }

        // Revisa la visibilidad al hacer scroll o redimensionar
        $(window).on("scroll resize", checkVisibility);

        // Llama inicialmente para detectar al cargar la página
        checkVisibility();
    });
</script>

<body class="vh-100 d-flex flex-column bg-light">
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-md fondo fixed-top">
                <div class="container d-flex align-items-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header align-items-center">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">DocuLab</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <a href="/">
                                <div class="d-flex align-items-center text-dark"><span
                                        class="fs-4 fw-semibold d-none d-md-block">DocuLab</span></div>
                            </a>

                            <ul class="navbar-nav justify-content-start flex-grow-1 ms-3 pe-3">
                                <li class="nav-item align-items-center">
                                    <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                                </li>
                            </ul>
                            <div class="col-md-3 d-md-none d-block ">
                                <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- botones de logeo idea -->
                    <?php if (isset($_SESSION['firstName'])): ?>
                        <!-- Dropdown visible en pantallas medianas y grandes -->
                        <div class="collapse navbar-collapse justify-content-end d-md-flex d-none" id="navbarNavDarkDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo htmlspecialchars($_SESSION['firstName']); ?>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu" style="right: 0; left: auto;">
                                        <li><a class="dropdown-item" href="logout.php">Cerrar Sesión</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- Toggler visible en pantallas pequeñas -->
                        <button class="navbar-toggler d-flex d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDropdown" aria-controls="offcanvasDropdown" aria-label="Toggle navigation">
                            <span class="fa-solid fa-address-card"></span>
                        </button>
                        <div class="offcanvas offcanvas-end d-md-none" tabindex="-1" id="offcanvasDropdown" aria-labelledby="offcanvasDropdownLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasDropdownLabel">Menú</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <button class="btn btn-dark dropdown-toggle w-100" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo htmlspecialchars($_SESSION['firstName']); ?>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu w-100">
                                            <li><a class="dropdown-item" style="text-align: center;" href="logout.php">Cerrar Sesión</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php else: ?>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#reg-offcanvas" aria-controls="reg-offcanvas" aria-label="Toggle navigation">
                            <i class="fa-solid fa-address-card"></i>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="reg-offcanvas" aria-labelledby="reg-offcanvasLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="reg-offcanvasLabel">Autenticación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body d-md-flex d-none justify-content-end">
                                <form class="row gap-3 d-md-block d-none" role="register">
                                    <a href="login.html" class="col-auto btn color-btn">Iniciar Sesión</a>
                                    <a href="register.html" class="col-auto btn color-btn">Registrarse</a>
                                </form>
                            </div>
                            <div class="offcanvas-body row d-flex d-md-none">
                                <form action="" class="d-flex flex-column">
                                    <a href="login.html" class="col-auto btn color-btn">Iniciar Sesión</a>
                                    <a href="register.html" class="col-auto btn color-btn">Registrarse</a>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </header>
    <!--  -->
    <!-- carrusel 1920 500 -->
    <section class="carrusel mt-5">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="max-height: 300px;">
                    <a href="resourse1.php">
                        <img style="opacity: 0.8;"
                            src="https://phoenixnap.com/glossary/wp-content/uploads/2022/09/what-is-hardware.jpg"
                            class="d-block w-100" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="fs-5">Hardware</h5>
                        <p>Conceptos e información relevante sobre el hardware. 😲</p>
                    </div>
                </div>
                <div class="carousel-item" style="max-height: 300px;">
                    <a href="resourse1.php">
                        <img style="opacity: 0.8;"
                            src="https://humanidades.com/wp-content/uploads/2017/04/hardware-4-e1566849269137.jpg"
                            class="d-block w-100" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>PROGRAMACIÓN</h5>
                        <p>Si puedes imaginarlo puedes programarlo.</p>
                    </div>
                </div>
                <div class="carousel-item" style="max-height: 300px;">
                    <a href="resourse1.php">
                        <img style="opacity: 0.8;"
                            src="https://cdn.diferenciador.com/imagenes/hardware-y-software-og.jpg"
                            class="d-block w-100" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>CHATGPT</h5>
                        <p>Tu asistente inteligente para resolver dudas, crear contenido y potenciar tu productividad
                        </p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <div class="container">
        <section class="nosotros mt-5">
            <h2 class="text-center">Quiénes Somos</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p>En DocuLab, nuestra misión es proporcionar una plataforma accesible y dinámica para que
                            cualquier usuario
                            pueda aprender conceptos básicos sobre tecnologías y herramientas digitales.
                            Esta página web está diseñada para ser un punto de encuentro entre el conocimiento y las
                            personas interesadas en comprender el mundo tecnológico de una manera sencilla y práctica.
                        </p>
                        <p>Nos esforzamos por ofrecer contenido claro, actualizado y orientado a facilitar el
                            aprendizaje de tecnologías
                            modernas, promoviendo así una comunidad de aprendizaje continuo..</p>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center my-2">
                        <img class="img-fluid w-50" src="https://encuestas.espe.edu.ec/tmp/assets/46dd5aad/ESPE.png"
                            alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="nosotros my-5">
            <h2 class="text-center mb-5">Nuestros Servicios</h2>
            <div class="container">
                <div class="row gap-2 gap-md-0">
                    <!-- cards 500-300 tamaño -->
                    <div class="col-md-4 col-12">
                        <div class="card text-center">
                            <img src="https://appmaster.io/api/_files/bLzbyrE3kokyk9p7QthYmA/download/"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Desarrollo de Aplicaciones Móviles</h5>
                                <p class="card-text">Exploramos lenguajes como Java y Kotlin para Android, y
                                    Swift para iOS, además de guías paso a paso para crear interfaces intuitivas.</p>
                                <a href="#" class="btn btn-primary btn-sm ">Ver mas</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="card text-center">
                            <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple221/v4/3d/ac/fe/3dacfe6b-f15c-be16-1153-7be82296046d/AppIcon-0-0-1x_U007emarketing-0-7-0-0-85-220.png/1200x600wa.png"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Redes Informáticas</h5>
                                <p class="card-text">Aprende los fundamentos de redes, desde conceptos básicos como
                                    configuración de routers y switches, hasta redes avanzadas como VPN y
                                    ciberseguridad. </p>
                                <a href="#" class="btn btn-primary btn-sm">Ver mas</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="card text-center">
                            <img src="https://cursosclautic.com/wp-content/uploads/unity-logo.jpg" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Desarrollo de Videojuegos</h5>
                                <p class="card-text">Aprende los fundamentos para diseñar y programar videojuegos con
                                    herramientas
                                    como Unity o Unreal Engine. Desde la creación de personajes hasta la lógica de los
                                    niveles.</p>
                                <a href="#" class="btn btn-primary btn-sm">Ver mas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="text-center " style="background-color: rgb(30, 29, 29); color:white">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4 d-flex justify-content-center gap-5">
                <!-- Facebook -->
                <div>
                    <a style="color: #3b5998;" href="#!" role="button">
                        <i class="fa-brands fa-facebook fa-xl" style="color: #ffffff;"></i>
                    </a>
                </div>
                <!-- Twitter -->
                <div>
                    <a style="color: black;" href="#!" role="button">
                        <i class="fa-brands fa-github fa-xl" style="color: #ffffff;"></i>
                    </a>
                </div>
                <!-- Instagram -->
                <div>
                    <a style="color: #ac2bac;" href="#!" role="button">
                        <i class="fa-brands fa-instagram fa-xl" style="color: #ffffff;"></i>
                    </a>
                </div>
            </section>
            <!-- Section: Social media -->
            <hr style="color: gray;">
            <!-- Copyright -->
            <div class="text-center px-3">
                <p>&copy; 2024 DocuLab. Este sitio y su contenido están protegidos por derechos de autor. Queda prohibida su reproducción total o parcial sin autorización previa. Consulte nuestros <a href="/terminos-y-condiciones">Términos y Condiciones</a> y <a href="/politica-de-privacidad">Política de Privacidad</a>.</p>
            </div>
            <!-- Copyright -->
        </div>
        <!-- Grid container -->
    </footer>
</body>

</html>