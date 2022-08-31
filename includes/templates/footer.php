<footer class="footer seccion">
    <div class="contenedor contenedor-footer">
        <nav class="navegacion">
            <a href="nosotros.php">Nosotros</a>
            <a href="anuncios.php">Anuncios</a>
            <a href="blog.php">Blog</a>
            <a href="contacto.php">Contacto</a>
        </nav>
    </div>
    <?php
     //hacer que el año se incremente cada que este cambie y que sea automatico
     $fecha = date('d-m-y'); //mayuscula imprime la fecha completa, funcion para imprimir fechas
     //dependiendo de lo que le pasemo nos mostrara el formate, solo se puede mostrar el año, o el mes o el dia o todo junto
    ?>
    <p>Todos los derechos reservados <?php echo date('Y')?> &copy;</p>
</footer>
<script src="/build/js/bundle.min.js"></script>
</body>
</html>