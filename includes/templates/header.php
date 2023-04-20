<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <!-- CSS -->
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="imagen de logo" srcset="">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono menu Responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-btn" src="/build/img/dark-mode.svg" alt="Boton de apariencia">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                    </nav>
                </div>

            </div>
            <?php if($inicio){ ?>
             <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php }; ?> 
        </div>
    </header>