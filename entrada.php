<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
        </picture>
        <p class="informacion-meta">Escrito el <span>20/10/2023</span> por <span>Admin</span></p>
        <div class="resumen-propiedad">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam 
            vel, quasi adipisci, voluptate libero nesciunt eveniet ex animi repudiandae ipsum aliquid? Natus minima illo doloribus
             unde omnis ex inventore suscipit.
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et, quaerat voluptate numquam officiis magni unde labore neque incidunt sit 
            repellendus molestiae recusandae reprehenderit eveniet corporis natus impedit. Accusamus, nemo consectetur.
            orem ipsum dolor sit amet consectetur adipisicing elit. Ullam 
            vel, quasi adipisci, voluptate libero nesciunt eveniet ex animi repudiandae ipsum aliquid? Natus minima illo doloribus
             unde omnis ex inventore suscipit.
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et, quaerat voluptate numquam officiis magni unde labore neque incidunt sit 
            repellendus molestiae recusandae reprehenderit eveniet corporis natus impedit. Accusamus, nemo consectetur.
        </p>
    </main>

    <?php 
        incluirTemplate('footer');
    ?>