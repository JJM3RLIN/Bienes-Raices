<main class="contenedor seccion"> 
    <h1>Actualizar Propiedad</h1>
    <a href="/public/admin" class="btn-amarillo">Volver al Administrador</a>
    <?php foreach($errores as $error):?>
   <div class="alerta error">
   <?php echo $error; ?>
   </div>
    <?php endforeach; ?>
    <!--eL ACTION ES PARA DECIR EN QUE ARCHIVO SE PROCESARA LA INFORMACION DEL FORMULARIO-->
    <form class="formulario" method="POST" enctype="multipart/form-data">
       <?php include __DIR__ . '/formulario.php' ?>
        <button type="submit" class="btn-amarillo">Actualizar Propiedad</button>
    </form>

</main>