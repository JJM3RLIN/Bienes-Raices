<main class="contenedor seccion">
<h1>Actualizar vendedor</h1>

<?php foreach($errores as $error): ?>
 <p class="alerta error"><?php echo $error ?></p>
  <?php endforeach; ?>  
<a href="/public/admin" class="btn-amarillo">Volver al Administrador</a>
<form class="formulario" method="POST">
    <?php require __DIR__ . '/vendedorForm.php'; ?>

    <button type="submit" class="btn-amarillo">Actualizar vendedor(a)</button>
</form>
</main>