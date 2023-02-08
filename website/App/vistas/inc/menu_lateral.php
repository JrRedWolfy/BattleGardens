<?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [5])): ?>

<div>

   

    <h3>¿Quien Soy?</h3>
    <p>Hola, mi nombre es Howler Bandog.</p>
    <p>Al tiempo que este proyecto se desarrolla, soy un estudiante en un grado de Desarrollo de Aplicaciones Web.</p>

    <h3>Battle Gardens</h3>
    <p>He elegido Battle Gardens como mi proyecto final de curso puesto que ha sido una idea que siempre he llevado conmigo y al fin tener la oportunidad de crear algo unico, algo que se sienta mio, algo por lo que vale invertir tiempo.</p>
</div>

<?php else: ?>

<div>

    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1])): ?>
    <div>

        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_usuario">Usuarios</a>

    </div>
    <?php endif ?>

    <!--Todos-->
    <div>

        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_publicacion">Publicaciones</a>

    </div>

    <!--Todos-->
    <div>

        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_evento">Eventos</a>

    </div>

    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 3])): ?>
    <!--Creador-->
    <div>

        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_extraviado">Extraviados</a>

    </div>

    <!--Creador-->
    <div>

        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_artefacto">Artefactos</a>

    </div>
    <?php endif ?>

    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 2])): ?>
    <!--Lore Master-->
    <div>

        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_historia">Historias</a>

    </div>

    <!--Lore Master-->
    <div>

        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_mundo">Mundos</a>

    </div>
    <?php endif ?>
    
    <br>
    <br>


</div>
<?php endif ?>