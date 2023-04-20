<?php 

    // importar la conexión
    require '../includes/config/database.php';
    $db = conectarDB();

    // escribir el query

    $query = "SELECT * FROM propiedades";

    // consultar la bd

    $consulta = mysqli_query($db, $query);

    // muestra mensaje condicional
    $resultado = $_GET["resultado"] ?? null;



    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            // eliminar el archivo

            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";

            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

            unlink('../imagenes/' . $propiedad['imagen']);

            // elimina la propiedad
            $query = "DELETE FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);

            if($resultado){
                header('Location: /admin?resultado=3');
            }
        }

    }

    // incluye un template
    require '../includes/funciones.php';
    incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Administrador de Bienes Raíces</h1>
    <?php 
        if(intval($resultado) === 1): ?>
            <p class="alerta exito">Anuncio Areado Correctamente</p>
        <?php elseif(intval($resultado) === 2):?>    
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif(intval($resultado) === 3):?>    
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
    <?php endif; ?>
    <a href="/admin/propiedades/crear.php" class="btn-verde">Nueva propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php while($propiedad = mysqli_fetch_assoc($consulta)): ?>
            <tr>
                <td><?php echo $propiedad['id']?></td>
                <td><?php echo $propiedad['titulo']?></td>
                <td> <img src="/imagenes/<?php echo $propiedad['imagen']?>" class="img-table"> </td>
                <td>$<?php echo $propiedad['precio']?></td>
                <td>
                    <form method="POST" >

                    <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                    <input type="submit" class="boton-rojo" value="Eliminar">
                    </form>
                    
                    <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']?>" class="btn-amarillo">Actualizar</a>
                </td>
            </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</main>


<?php 

                // cerrar la conexión
                mysqli_close($db);
       incluirTemplate('footer');
    ?>