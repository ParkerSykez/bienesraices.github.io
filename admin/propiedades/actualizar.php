<?php

// validar que la url sea valida
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: /admin');
    }

    // bd
    require '../../includes/config/database.php';
    $db = conectarDB();

    // consulta para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $vendores = mysqli_query($db, $consulta);


    // Consulta para obtener los datos de la propiedad

    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);
    // echo "<pre>";
    // var_dump($propiedad);
    // echo "</pre>";
    

    require '../../includes/funciones.php';
    incluirTemplate('header');

    // arreglo con mensaje de errores
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedores_id'];
    $imgPropiedad = $propiedad['imagen'];
    



    // ejecutar el código dsps de que el usuario envíe el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "<pre>";

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        // Asignar files hacia una variables

        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores[] = 'Debes añadir un titulo';
        }
        if(!$precio){
            $errores[] = 'Debes añadir un precio';
        }
        if(strlen($descripcion) < 100){
            $errores[] = 'Descripción obligatoria y debe tener al menos 100 caracteres';
        }
        if(!$habitaciones){
            $errores[] = 'El número de habitaciones es obligatorio';
        }
        if(!$wc){
            $errores[] = 'El número de baños es obligatorio';
        }
        if(!$estacionamiento){
            $errores[] = 'El número de Estacionamiento es obligatorio';
        }
        if(!$vendedorId){
            $errores[] = 'Elige un vendedor';
        }
      
    // validar img por tamaño (1mega máximo)

        // $medida = 1000 * 1000;
        // if($imagen['size'] > $medida || $imagen['error'] ){
        //     $errores[] = 'La imagen es muy pesada';
        // }

        if(empty($errores)){

          // crear una carpeta

            $carpetaImagenes = '../../imagenes/';
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }
            // SUBIDA DE ARCHIVOS

            $nombreImg = '';


            if($imagen['name']){
                // eliminar la imagen previa

                unlink($carpetaImagenes . $propiedad['imagen']);
                          // // generar un nombre único
                $nombreImg = md5(uniqid(rand (), true ) )  . ".jpg";

            // // subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImg);
            } else {
                $nombreImg = $propiedad['imagen'];
            }
 
           
  

        // ACTUALIZAR EN LA BD
            $query = " UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImg}', descripcion = '${descripcion}', habitaciones = ${habitaciones},
            wc = ${wc}, estacionamiento = ${estacionamiento}, vendedores_id = ${vendedorId} WHERE id = ${id}";
        
            //     echo $query;

            // exit;

        // // echo $query;

             $resultado = mysqli_query($db, $query);

            if($resultado){
                // redireccionar al usuario
                header ("Location: /admin?resultado=2");
        }
        }


    }
     

?>
<main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>
    <a href="/admin" class="btn-verde">Volver</a>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
        <?php echo $error; ?>
        </div>
       
    <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">

        <fieldset>
            <legend>Información General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo;?>" >

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio;?>" >

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" >
            
            <img src="/imagenes/<?php echo $imgPropiedad ?>" alt="Imagen de la Propiedad" class="img-small">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion"> <?php echo $descripcion;?> </textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo $habitaciones ?>" >

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo $wc ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej. 2" min="1" max="9" value="<?php echo $estacionamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" id="">
                <option value="" selected disabled> --Selecione--</option>
                <?php while($row = mysqli_fetch_assoc($vendores) ): ?>

                    <option <?php echo $vendedorId === $row['id'] ? 'selected' : '';  ?>  
                    value="<?php echo $row['id']; ?>"> <?php echo $row['nombre'] . " " . $row['apellido'];?> </option>

                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar propiedad" class="btn-verde"> 


    </form>
</main>

<?php 
       incluirTemplate('footer');
    ?>