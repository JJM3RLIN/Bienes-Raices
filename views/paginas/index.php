<main class="contenedor seccion">
    <h2 data-cy="heading-nosotros">Mas sobre nosotros</h2>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="/public/build/img/icono1.svg" alt="icono-seguridad" aria-hidden="true" loading="leazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique illo facere,
                dolores dolorem labore magni voluptates natus quide</p>
        </div>
        <div class="icono">
            <img src="/public/build/img/icono2.svg" alt="icono-dinero" aria-hidden="true" loading="leazy">
            <h3>Dinero</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique illo facere,
                dolores dolorem labore magni voluptates natus quide</p>
        </div>
        <div class="icono">
            <img src="/public/build/img/icono3.svg" alt="icono-dinero" aria-hidden="true" loading="leazy">
            <h3>Tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique illo facere,
                dolores dolorem labore magni voluptates natus quide</p>
        </div>
    </div>

</main>
<section class="seccion contenedor">
    <h2>Casas y Departamentos en venta</h2>

    <?php
    require 'listado.php';
    ?>

    <div class="alinear-derecha">
        <a data-cy="ver-propiedades" href="/public/propiedades" class="btn-amarillo">Ver Todas</a>
    </div>
</section>

<section class="grafico">
    <h2 data-cy="grafico-titulo">Encuentra la casa de tus sueños</h2>
    <p data-cy="grafico-texto">Llene el formulario de contacto y un asesor se contactara con usted</p>
    <div>
        <a href="/public/contacto" class="btn" data-cy="btn-contacto">Contactános</a>
    </div>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog" data-cy="blog">
        <h3>Nuestro blog</h3>
        <article>
            <div class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/public/build/img/blog1.avif" type="image/avif">
                        <source srcset="/public/build/img/blog1.webp" type="image/webp">
                        <img src="/public/build/img/blog1.jpg" loading="lazy" alt="Entrada al blog">
                    </picture>
                </div>
                <!--Imagen-->

                <div class="texto-entrada">
                    <a href="/public/blog">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el:<span>21/11/2021</span> por: <span>Admin</span></p>
                        <p>
                            Consejos para construir una terraza en el techo de tu casa
                            con los mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
            </div>
        </article>


        <article>
            <div class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/public/build/img/blog2.avif" type="image/avif">
                        <source srcset="/public/build/img/blog2.webp" type="image/webp">
                        <img src="/public/build/img/blog2.jpg" loading="lazy" alt="Entrada al blog">
                    </picture>
                </div>
                <!--Imagen-->

                <div class="texto-entrada">
                    <a href="/public/blog">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el:<span>21/11/2021</span> por: <span>Admin</span></p>
                        <p>
                            Consejos para construir una terraza en el techo de tu casa
                            con los mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
            </div>
        </article>
    </section>
    <section class="testimoniales" data-cy="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                <!--En esta etiqueta suelen colocarse los testimoniales-->
                El personal es muy comprometido y se comporto de una excelente forma, muy buena
                atención y la casa que me ofrecieron cumple coon mis expectativas
            </blockquote>
            <p>-Alan J.</p>
        </div>
        <div class="testimonial">
            <blockquote>
                <!--En esta etiqueta suelen colocarse los testimoniales-->
                El personal es muy comprometido y se comporto de una excelente forma, muy buena
                atención y la casa que me ofrecieron cumple coon mis expectativas
            </blockquote>
            <p>-Jorge J.</p>
        </div>
    </section>
</div>
