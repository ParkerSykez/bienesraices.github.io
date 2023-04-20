
<?php 
    require 'includes/funciones.php';
    incluirTemplate('header',$inicio = true);
?>
    <main class="contenedor seccion">
        <h1>Más sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img loading="lazy" src="build/img/icono1.svg" alt="Icono seguridad" >
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum eius 
                atque natus non eveniet? Commodi aliquid explicabo placeat modi libero ipsam 
                nulla iure eveniet id numquam, eligendi magni expedita. Maiores.</p>
            </div> <!--FIN ICONO-->
            <div class="icono">
                <img loading="lazy" src="build/img/icono2.svg" alt="Icono precio">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum eius 
                atque natus non eveniet? Commodi aliquid explicabo placeat modi libero ipsam 
                nulla iure eveniet id numquam, eligendi magni expedita. Maiores.</p>
            </div> <!--FIN ICONO-->
            <div class="icono">
                <img loading="lazy" src="build/img/icono3.svg" alt="Icono tiempo" >
                <h3>A tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum eius 
                atque natus non eveniet? Commodi aliquid explicabo placeat modi libero ipsam 
                nulla iure eveniet id numquam, eligendi magni expedita. Maiores.</p>
            </div> <!--FIN ICONO-->
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>

        <?php
        $limite = 3;
            include 'includes/templates/anuncios.php';
        ?>
        <div class="ver-todas derecha">
            <a href="anuncios.php" class="btn-verde">Ver Todas</a>
        </div>
    </section>

    <section class="img-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="btn-amarillo-inline">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>
            <article class="entrada-blog">
                <div class="img">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los
                            mejores materiales y ahorrando
                        </p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="img">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>
                        <p>
                            Maximixar el espacio de tu hogar con esta guía, aprende a cambinar muebles y
                            colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>            
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testiminal">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que
                    me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Parker S.</p>
            </div>
        </section>
    </div>
    
    <?php 
        incluirTemplate('footer');
    ?>