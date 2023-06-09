<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: /');
    }

    require 'includes/config/database.php';
    $db = conectarDB();
    $query = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $query);

    if(!$resultado->num_rows){
        header('Location: /');
    }


    $propiedad = mysqli_fetch_assoc($resultado);

?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo'] ?></h1>
        <div class="resumen-propiedad">
                <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagen de la propiedad">
            <p class="precio">
                <?php echo $propiedad['precio']  ?>
            </p>
            <ul class="iconos-caracteristicas">
                <li> 
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>
                        <?php echo $propiedad['wc']  ?>
                    </p>
                </li>
                <li> 
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>
                        <?php echo $propiedad['estacionamiento']  ?>
                    </p>
                </li>
                <li> 
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p>
                    <?php echo $propiedad['habitaciones']  ?>
                    </p>
                </li>
            </ul>
        </div>
        
        <p>
        <?php echo $propiedad['descripcion']  ?>
        </p>
    </main>

    <?php 

        mysqli_close($db);

        incluirTemplate('footer');
    ?>