<main class="contenedor seccion">
    <h1 data-cy="contacto-titulo">Contacto</h1>
    <?php 
    if($mensaje){
    ?>
     <?php 
    if($mensaje === 'Mensaje enviado correctamente'):
    ?>
    <p class='alerta exito'> <?php echo $mensaje ?></p>
    <?php 
    else:
    ?>
     <p class='alerta error'> <?php echo $mensaje ?></p>
    <?php endif;?>
    <?php }?>
    <picture>
        <source srcset="build/img/destacada3.avif" type="image/avif">
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <img src="build/img/destacada3.jpg" loading= "lazy" alt="Imagen contacto">
    </picture>
    <h2 data-cy="heading-form">Llene el formulario de Contacto</h2>
    <!--Todos los formularios dentro de un form-->
    <form method="POST" class="formulario" data-cy="form-contacto">
        <fieldset> <!--Agrupar varios input que iran juntos-->
            <legend>Información personal</legend>
             <label for="nombre">Nombre:</label>
             <input data-cy="input-nombre" type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

             <label for="mensaje">Mensaje:</label>
             <textarea data-cy="input-mensaje" id="mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset> 
            <legend>Información sobre la propiedad</legend>
             <label for="opciones">Vende o Compra:</label>
            <select id="opciones" name="contacto[tipo]" required data-cy="input-opciones">
                <option selected disabled>--Selecciona una opción--</option>
                <option value="Compra">Compra</option>
                <option value="Venta">Venta</option>
            </select>

             <label for="presupuesto">Precio o presupuesto:</label>
             <input data-cy="input-precio" type="number" placeholder="Tu precio o presupuesto" id="presupuesto" min="0" name="contacto[precio]" required>
        </fieldset>

        <fieldset> 
            <legend>Contacto</legend>
             <p>Como deseas ser contactado:</p>
             <div class="forma-contacto">
                <label for="contactado-tel">Teléfono</label>
                <input data-cy="forma-contacto" type="radio" id="contactado-tel" name="contacto[contacto]" value="telefono">
                <label for="contactado-mail">E-mail</label>
                <input data-cy="forma-contacto" type="radio" id="contactado-mail" name="contacto[contacto]" value="correo">
             </div>
             <!--Dependiendo lo que eliga se mostrara con javaScript-->
             <div id="contacto"></div>
           
        </fieldset>
        <button type="submit" class="btn-verde">Enviar</button>
    </form>
</main>