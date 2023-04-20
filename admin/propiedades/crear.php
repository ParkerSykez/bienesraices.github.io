<?php
    // bd
    require '../../includes/config/database.php';
    $db = conectarDB();

    // consulta para obtener los vendedores

    $consulta = "SELECT * FROM vendedores";

    $vendores = mysqli_query($db, $consulta);


    require '../../includes/funciones.php';
    incluirTemplate('header');

    // arreglo con mensaje de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';

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
        if(!$imagen['name']){
            $errores[] = 'La imagen es obligatoria';
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

        $medida = 1000 * 1000;
        if($imagen['size'] > $medida || $imagen['error'] ){
            $errores[] = 'La imagen es muy pesada';
        }

        if(empty($errores)){

            // SUBIDA DE ARCHIVOS

            // crear una carpeta

            $carpetaImagenes = '../../imagenes/';
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            // generar un nombre único

            $nombreImg = md5(uniqid(rand (), true ) )  . ".jpg";

            // subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImg);
        // INSERTAR EN LA BD

            $query = " INSERT INTO propiedades (titulo, precio, imagen ,descripcion, habitaciones, wc, estacionamiento, creado , vendedores_id) 
            VALUES ('$titulo', '$precio', '$nombreImg' , '$descripcion' , '$habitaciones', '$wc', '$estacionamiento', '$creado' ,'$vendedorId' )";
        

        // // echo $query;

             $resultado = mysqli_query($db, $query);

            if($resultado){
                // redireccionar al usuario
                header ("Location: /admin?resultado=1");
        }
        }


    }
     

?>
<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="btn-verde">Volver</a>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
        <?php echo $error; ?>
        </div>
       
    <?php endforeach; ?>
    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">

        <fieldset>
            <legend>Información General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo;?>" >

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio;?>" >

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" >

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

        <input type="submit" value="Crear propiedad" class="btn-verde"> 


    </form>
</main>

<?php 
       incluirTemplate('footer');
    ?>