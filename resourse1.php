<?php
session_start();

// Asegúrate de que $_SESSION esté inicializada
if (!isset($_SESSION)) {
    $_SESSION = array();
}

// Tu código aquí...
// Verifica que la clave exista en $_SESSION antes de acceder a ella
if (isset($_SESSION['firstName'])) {
    $username = $_SESSION['firstName'];
} else {
    $username = 'Anonymous';
}

// Resto de tu código...
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hardware</title>
    <link rel="shortcut icon" href="svg/Dsvg.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        a {
            text-decoration: none;
        }

        .tema>h4,
        .subtema>h5 {
            background-color: #f0f0f0;
            padding: 10px 5px;
        }

        .rotate {
            transition: transform 0.5s ease-in-out;
            transform: rotate(180deg);
        }

        .nav-link {
            color: black;
        }

        .nav-link:hover {
            color: #4d4d4d;
        }

        .fondo {
            background-color: #f0f0f0;
            z-index: 1001;
            /* Asegura que el navbar esté por encima del sidebar */
        }

        .color-btn:hover,
        .subtema>h5:hover,
        .tema>h4:hover {
            background-color: #d1d1d1;
            color: black;
        }

        /* Elimina los estilos anteriores del sidebar y añade estos */
        .position-sticky {
            position: sticky !important;
            align-self: flex-start;
        }

        #navbar-example3 {
            background-color: #f8f9fa;
            padding: 15px 0;
        }

        /* Asegura que el contenido principal no se solape */
        .col-md-9 {
            padding-left: 30px;
        }

        /* Ajustes para el footer */
        footer {
            z-index: 1001;
            position: relative;
        }
    </style>
    <script>
        $(function() {
            $(".subtema").children(".contenido").hide();
            $(".tema, .subtema").click(function() {
                $(this).children(".contenido").slideToggle(1000)
            })
            $(".tema").click(function() {
                $(this).children("h4").children("span").children("i").toggleClass("rotate");
            });
            $(".subtema").click(function() {
                let icon = $(this).find("h5 span i");

                // Detiene animaciones en curso y resetea la rotación antes de cada clic
                icon.stop(true, true).css("transform", "rotate(0deg)");

                // Aplica la animación de rotación
                $({
                    deg: 0
                }).animate({
                    deg: 360
                }, {
                    duration: 500,
                    step: function(now) {
                        icon.css("transform", "rotate(" + now + "deg)");
                    }
                });
            });
        });
    </script>
</head>

<body class="vh-100 d-flex flex-column bg-light">
    <nav class="navbar navbar-expand-md fondo fixed-top">
        <div class="container d-flex align-items-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header align-items-center">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">DocuLab</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <a class="text-dark" href="/">
                        <div class="d-flex align-items-center"><span
                                class="fs-4 fw-semibold d-none d-md-block">DocuLab</span></div>
                    </a>

                    <ul class="navbar-nav justify-content-start flex-grow-1 ms-3 pe-3">
                        <li class="nav-item align-items-center">
                            <a class="nav-link" aria-current="page" href="/">Inicio</a>
                        </li>
                    </ul>
                    <div class="col-md-3 d-md-none d-block ">
                        <nav id="navbar-example3" class="flex-column align-items-stretch pe-4 border-end">
                            <nav class="nav flex-column">
                                <a class="nav-link" href="#Hardware">Hardware</a>
                                <nav class="nav flex-column">
                                    <a class="nav-link ms-3 my-1" href="/resourse1.html#wiHardware">Concepto</a>
                                    <a class="nav-link ms-3 my-1" href="#History">Historia</a>
                                    <a class="nav-link ms-3 my-1" href="#Types">Tipos</a>
                                    <a class="nav-link ms-3 my-1" href="#Examples">Ejemplos</a>
                                    <a class="nav-link ms-3 my-1" href="#HyS">Hardware y Software</a>
                                    <a class="nav-link ms-3 my-1" href="#freeHardware">Hardware libre</a>
                                </nav>
                            </nav>
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

    <div class="container flex-grow-1" style="margin-top: 56px;">
        <div class="row position-relative">
            <div class="col-md-3 d-none d-md-block">
                <div class="position-sticky" style="top: 56px; height: calc(100vh - 56px); z-index: 1000;">
                    <nav id="navbar-example3" class="h-100 overflow-auto pe-4 border-end">
                        <nav class="nav flex-column">
                            <a class="nav-link" href="#Hardware">Hardware</a>
                            <nav class="nav flex-column">
                                <a class="nav-link ms-3 my-1" href="#wiHardware">Concepto</a>
                                <a class="nav-link ms-3 my-1" href="#History">Historia</a>
                                <a class="nav-link ms-3 my-1" href="#Types">Tipos</a>
                                <a class="nav-link ms-3 my-1" href="#Examples">Ejemplos</a>
                                <a class="nav-link ms-3 my-1" href="#HyS">Hardware y Software</a>
                                <a class="nav-link ms-3 my-1" href="#freeHardware">Hardware libre</a>
                            </nav>
                        </nav>
                    </nav>
                </div>
            </div>

            <div class="col-md-9 col-12 offset-md-3 m-0 p-0">
                <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true">
                    <div id="Hardware" class="tema">
                        <h4><span><i class="fa-solid fa-angle-down"></i></span> Hardware</h4>
                        <div class="contenido">
                            <p>Te explicamos qué es hardware y las generaciones de hardware que existen. Además tipos de
                                hardware y ejemplos de hardware, y la diferencia entre harware y software.</p>
                            <div class="row justify-content-center text-center mt-3 mb-3">
                                <div class="col-md-8">
                                    <img class="img-fluid"
                                        src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                        alt="image of hardware">
                                    <p class="form-text text-muted">El hardware es el conjunto de los componentes mecánicos,
                                        electrónicos, eléctricos y periféricos de un computador.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="wiHardware" class="subtema">
                        <h5><span><i class="fa-solid fa-angle-down"></i></span> ¿Qué es el hardware?</h5>
                        <div class="contenido">
                            <p>En computación e informática, se conoce como hardware (del inglés hard, rígido, y ware,
                                producto, mercancía) al conjunto de los componentes materiales, tangibles, de un computador
                                o un sistema informático. Incluye todas las partes mecánicas, eléctricas y electrónicas, sin
                                considerar los programas y otros elementos digitales que forman parte del software.</p>
                            <p>El término hardware se utilizó en inglés a partir del siglo XV para designar utensilios y
                                herramientas fabricados con metales duros. Actualmente, hardware también se emplea con los
                                significados de ‘ferretería, ‘armamento’ y ’conjunto de baratijas de metal’.</p>
                            <p>Con el surgimiento de las computadoras en la década de 1940, se comenzó a denominar hardware
                                a los componentes físicos de la máquina para distinguirlos de los componentes lógicos.</p>
                            <p>La palabra se emplea en español y otros idiomas sin traducción. En el caso del español, se
                                han propuesto, sin demasiado éxito, varios términos y expresiones equivalentes: equipo,
                                equipo informático, componentes, soporte físico.</p>
                        </div>
                    </div>
                    <div id="History" class="subtema">
                        <h5><span><i class="fa-solid fa-angle-down"></i></span> Historia del hardware</h5>
                        <div class="contenido">
                            <p>Desde los primeros sistemas informáticos, el hardware ha experimentado importantes cambios,
                                con el fin de obtener computadoras más veloces y capaces de desarrollar una mayor diversidad
                                de tareas. Teniendo en cuenta los adelantos más significativos, se distinguen al menos
                                cuatro generaciones de hardware:</p>
                            <ul>
                                <li><span class="fw-semibold">Primera generación (1945-1956).</span> Eran máquinas de
                                    cálculo que operaban mediante tubos al vacío.</li>
                                <li><span class="fw-semibold">Segunda generación (1957-1963).</span> Se inventaron los
                                    transistores, gracias a los cuales se redujo enormemente el tamaño total de las
                                    computadoras.</li>
                                <li><span class="fw-semibold">Tercera generación (1964-1971).</span> Se diseñaron los
                                    primeros circuitos integrados, impresos en pastillas de silicio, lo que permitió una
                                    mayor rapidez y efectividad en el procesamiento de la información.</li>
                                <li><span class="fw-semibold">Cuarta generación (1971-1981).</span> Surgieron los
                                    microprocesadores, que permitieron la creación de la computadora personal (PC).</li>
                            </ul>
                        </div>
                    </div>
                    <div id="Types" class="tema">
                        <h4><span><i class="fa-solid fa-angle-down"></i></span> Tipos de hardware</h4>
                        <div class="contenido">
                            <div class="row justify-content-center text-center mt-3 mb-3">
                                <div class="col-md-8">
                                    <img class="img-fluid"
                                        src="https://images.pexels.com/photos/1105379/pexels-photo-1105379.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                        alt="image of hardware">
                                    <p class="form-text text-muted">Los dispositivos del hardware de entrada pueden estar
                                        integrados a la máquina o ser removibles.</p>
                                </div>
                            </div>
                            <p>De acuerdo con la tarea que desempeña, el hardware se clasifica en cinco categorías
                                principales:</p>
                            <ul>
                                <li><span class="fw-semibold">Hardware de almacenamiento.</span> Es la memoria del sistema.
                                    Se trata de unidades que permiten guardar la información, tanto en soportes internos
                                    dentro de la máquina como en soportes extraíbles y portátiles. El principal componente
                                    de este tipo es la memoria de acceso aleatorio, más conocida como memoria RAM (sigla en
                                    inglés de Random Access Memory).</li>
                                <li><span class="fw-semibold">Hardware de entrada.</span> Son dispositivos que permiten
                                    ingresar información al sistema. Pueden estar integrados a la máquina o ser removibles.
                                    El teclado, el mouse, el micrófono y el escáner forman parte de este tipo de
                                    dispositivos.</li>
                                <li><span class="fw-semibold">Hardware de salida.</span> Son dispositivos semejantes a los
                                    de entrada, pero permiten extraer información del sistema. Entre este tipo de
                                    dispositivos se encuentran la impresora y los altavoces.</li>
                                <li><span class="fw-semibold">Hardware de entrada y salida.</span> Son aquellos dispositivos
                                    que combinan las funciones de entrada y de salida de información del sistema. Los discos
                                    rígidos y las memorias USB son componentes de entrada y salida.</li>
                            </ul>
                            <p>El hardware también se puede clasificar teniendo en cuenta su importancia. En este caso, se
                                distinguen dos grupos:</p>
                            <ul>
                                <li><span class="fw-semibold">Hardware crítico.</span> Es aquel sin el cual la computadora
                                    no puede funcionar. Incluye la placa madre, la CPU, la memoria RAM, la tarjeta gráfica y
                                    la fuente de alimentación.</li>
                                <li><span class="fw-semibold">Hardware no crítico. </span> Son los componentes que, aunque
                                    necesarios, no son imprescindibles para el arranque de la computadora. A esta categoría
                                    pertenecen el disco duro y, en general, los dispositivos de entrada y salida.</li>
                            </ul>
                        </div>
                    </div>
                    <div id="Examples" class="tema">
                        <h4><span><i class="fa-solid fa-angle-down"></i></span> Ejemplos de hardware</h4>
                        <div class="contenido">
                            <p>Algunos ejemplos de hardware son:</p>
                            <ul>
                                <li><span class="fw-semibold">La placa madre.</span> Es un circuito impreso sobre el que se
                                    conectan el resto de los componentes de la computadora. Las características de la placa
                                    madre determinan las características del resto de los componentes (tecnología del
                                    procesador, el tipo de memoria RAM, el rendimiento de la tarjeta gráfica, etc.). Una
                                    serie de componentes llamados buses conectan los componentes entre sí.</li>
                                <li><span class="fw-semibold">El procesador.</span>Consiste en un chip (circuito integrado)
                                    encapsulado. Realiza operaciones aritméticas y lógicas simples y operaciones de lógica
                                    binaria; además, controla el acceso a la memoria. Tiene un zócalo que permite conectarlo
                                    con la placa base. AMD e Intel son los principales fabricantes de procesadores.</li>
                                <li><span class="fw-semibold">La memoria RAM. </span> Está formada por un conjunto de chips
                                    que almacenan información, a la que el procesador puede acceder rápidamente. Se denomina
                                    memoria de acceso aleatorio porque puede leer o escribir información ubicada en
                                    cualquier posición, sin necesidad de seguir un orden correlativo. <br> La información de
                                    la RAM permanece almacenada de manera temporaria, es decir, se pierde cuando se apaga el
                                    equipo.</li>
                                <li><span class="fw-semibold">La unidad de almacenamiento.</span> </li>
                                <ul>
                                    <li><span class="fw-semibold">Los HDD</span> más antiguos, están formados por uno o
                                        varios platos giratorios de metal, en los que un cabezal magnético lee o escribe
                                        información a medida que se usa la computadora.</li>
                                    <li><span class="fw-semibold">Las unidades SSD</span> más modernas, no poseen partes
                                        mecánicas: la información se guarda en chips que utilizan memoria flash. Esta
                                        tecnología permite leer y escribir información ubicada en distintas posiciones al
                                        mismo tiempo. De este modo, resultan mucho más veloces que los discos duros.</li>
                                </ul>
                                <li><span class="fw-semibold">La tarjeta gráfica o tarjeta de video.</span> Este componente
                                    procesa los datos de la CPU y los convierte en información visual, que pueda ser
                                    observada en un monitor. , Con el fin de alivianar la labor de la CPU, la tarjeta
                                    gráfica posee su propio procesador: la unidad de procesamiento gráfico (GPU). También
                                    tiene su propia memoria RAM: la VRAM. Además, cuenta con un componente que convierte las
                                    señales digitales en señales analógicas, de manera que puedan ser leídas por un monitor.
                                </li>
                                <li><span class="fw-semibold">La fuente de energía.</span> Se encarga de recibir la
                                    corriente eléctrica alterna y de transformarla en corriente continua, que alimenta los
                                    dispositivos internos de la computadora. La fuente se ocupa, además, de filtrar y
                                    distribuir el voltaje que precisan los dispositivos para funcionar, ya que no todos
                                    requieren la misma cantidad de voltios.</li>
                            </ul>
                        </div>
                    </div>
                    <div id="HyS" class="subtema">
                        <h5><span><i class="fa-solid fa-angle-down"></i></span> Hardware y Software</h5>
                        <div class="contenido">
                            <div class="row justify-content-center text-center mt-3 mb-3">
                                <div class="col-md-8">
                                    <img class="img-fluid"
                                        src="https://concepto.de/wp-content/uploads/2014/10/hardware-y-software-e1551047538539.jpg"
                                        alt="image of hardware">
                                    <p class="form-text text-muted">El software integra los aspectos intangibles del
                                        computador.</p>
                                </div>
                            </div>
                            <p>Para que el hardware funcione, es necesario que se le indique cómo hacerlo. De esto se ocupa
                                el software, el conjunto de componentes intangibles de una computadora. Forman parte del
                                software tanto el sistema operativo y los programas como los datos que procesa el CPU.</p>
                            <p>Hardware y software son, por lo tanto, aspectos de la computadora que operan de modo
                                conjunto, ya que el primero sostiene al segundo y este último permite controlar el modo en
                                que opera y el objetivo del primero.</p>
                        </div>
                    </div>
                    <div id="freeHardware" class="subtema">
                        <h5><span><i class="fa-solid fa-angle-down"></i></span> Hardware libre</h5>
                        <div class="contenido">
                            <p>Desde hace tiempo, en paralelo con los avances en el área de la informática, ha venido
                                cobrando impulso el hardware libre. De manera general, el hardware libre es aquel que puede
                                ser modificado y utilizado libremente. En la práctica, se trata de los dispositivos de
                                hardware cuyas especificaciones y diagramas son de acceso público (ya sea mediante un pago o
                                de manera gratuita).</p>
                            <p>Como sucede con el software libre, el uso del hardware libre supone compartir la información
                                de los desarrollos que se hayan basado en él, independientemente de que se explote
                                comercialmente o no. Existen distintos tipos de licencias de hardware libre, que establecen
                                los alcances específicos del uso del hardware.</p>
                            <p>Actualmente, existen varias iniciativas de hardware libre. Muchas son proyectos de carácter
                                colaborativo, orientados al desarrollo de alguna nueva tecnología (procesadores de alto
                                rendimiento, dispositivos con menor impacto ambiental, impresoras inteligentes). Otras son
                                parte de programas educativos o sociales (dispositivos creados para la enseñanza de la
                                informática, computadoras de bajo costo).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5" id="comentarios">
        <h2>Sección de Comentarios</h2>
        <form action="comments.php" method="POST">
            <div class="mb-3">
                <label for="comment" class="form-label">Escribe tu comentario:</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <div class="mt-4">
            <h4>Comentarios anteriores:</h4>
            <?php
            include 'comments.php';
            foreach ($comments as $comment) {
                $parts = explode('|', $comment, 3);
                if (count($parts) === 3) {
                    list($timestamp, $username, $commentText) = $parts;
                    $displayName = (isset($_SESSION['firstName']) && $username === $_SESSION['firstName']) ? 'Tú' : $username;
                    echo "<p><strong>$displayName</strong>: $commentText</p>";
                } else {
                    echo "<p>Error en el formato del comentario: $comment</p>";
                }
            }
            ?>
        </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.position-sticky');
        const comentarios = document.getElementById('comentarios');
        const mainContent = document.querySelector('.col-md-9');

        function updateSidebarPosition() {
            if (!sidebar || !comentarios) return;

            const sidebarHeight = sidebar.offsetHeight;
            const comentariosTop = comentarios.offsetTop;
            const scrollPosition = window.scrollY + 56; // 56px = altura del navbar

            // Calcula hasta dónde debe llegar el sidebar
            const maxScroll = comentariosTop - sidebarHeight - 100;

            if (scrollPosition > maxScroll) {
                sidebar.style.position = 'absolute';
                sidebar.style.top = `${maxScroll}px`;
            } else {
                sidebar.style.position = 'sticky';
                sidebar.style.top = '56px';
            }
        }

        // Ejecutar al cargar y en eventos
        window.addEventListener('scroll', updateSidebarPosition);
        window.addEventListener('resize', updateSidebarPosition);

        // Observar cambios en el contenido principal
        const resizeObserver = new ResizeObserver(updateSidebarPosition);
        if (mainContent) {
            resizeObserver.observe(mainContent);
        }

        updateSidebarPosition();
    });
</script>

</html>