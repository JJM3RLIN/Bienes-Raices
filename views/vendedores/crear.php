<main class="contenedor seccion">
<h1>Registrar vendedor</h1>
<?php foreach($errores as $error):?>
   <div class="alerta error">
   <?php echo $error; ?>
   </div>
    <?php endforeach; ?>
<a href="/public/admin" class="btn-amarillo">Volver al Administrador</a>
<form class="formulario" method="POST">
    <?php include __DIR__ . '/vendedorForm.php'; ?>

    <button type="submit" class="btn-amarillo">Registrar vendedor(a)</button>
</form>
</main>