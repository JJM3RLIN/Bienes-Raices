<main class="contenedor seccion contenido-centrado">
<h1 data-cy="login-titulo">Iniciar sesión</h1>

<?php foreach( $errores as $error): ?>

 <div class="alerta error"> 
 <?php echo $error; ?> 
</div>

<?php endforeach;?>
<form class="formulario" method="POST" data-cy="form-login">

<fieldset> <!--Agrupar varios input que iran juntos-->
            <legend>Contraseña y correo</legend>
            

             <label for="email">Correo electronico:</label>
             <input data-cy="input-correo" type="email" name="email" placeholder="Tu correo" id="email" value="  <?php echo $aute->correo ?> " require>

             <label for="contraseña">Contraseña:</label>
             <input data-cy="input-contra" type="password" placeholder="Escribe la contraseña" id="contraseña" name="contraseña" require>
        </fieldset>

        <button type="submit" class="btn-amarillo">Iniciar sesión</button>

</form>
</main>