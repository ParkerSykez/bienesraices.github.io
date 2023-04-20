<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Conoce sobre nososotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/wep">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum deleniti inventore 
                    repellendus ea quae fuga iste explicabo temporibus, consequatur nesciunt doloribus eum id natus 
                    fugit delectus quis repudiandae dolor eos?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, magnam eaque. Mollitia accusamus pariatur 
                    architecto, impedit, officia possimus delectus incidunt aspernatur quae eveniet maxime voluptatibus perferendis, 
                    ipsa voluptate rem natus.
                </p>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum deleniti inventore 
                    repellendus ea quae fuga iste explicabo temporibus, consequatur nesciunt doloribus eum id natus 
                    fugit delectus quis repudiandae dolor eos?
                </p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
        <h1>Más sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum eius 
                atque natus non eveniet? Commodi aliquid explicabo placeat modi libero ipsam 
                nulla iure eveniet id numquam, eligendi magni expedita. Maiores.</p>
            </div> <!--FIN ICONO-->
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum eius 
                atque natus non eveniet? Commodi aliquid explicabo placeat modi libero ipsam 
                nulla iure eveniet id numquam, eligendi magni expedita. Maiores.</p>
            </div> <!--FIN ICONO-->
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>A tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum eius 
                atque natus non eveniet? Commodi aliquid explicabo placeat modi libero ipsam 
                nulla iure eveniet id numquam, eligendi magni expedita. Maiores.</p>
            </div> <!--FIN ICONO-->
        </div>
    </section>

    <?php 
       incluirTemplate('footer');
    ?>