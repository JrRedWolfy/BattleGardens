<?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [5])): ?>

<div>

   

    <h3>¿Quien Soy?</h3>
    <p>Hola, mi nombre es Howler Bandog.</p>
    <p>Al tiempo que este proyecto se desarrolla, soy un estudiante en un grado de Desarrollo de Aplicaciones Web.</p>

    <h3>Battle Gardens</h3>
    <p>He elegido Battle Gardens como mi proyecto final de curso puesto que ha sido una idea que siempre he llevado conmigo y al fin tener la oportunidad de crear algo unico, algo que se sienta mio, algo por lo que vale invertir tiempo.</p>
</div>

<?php else: ?>

<h3>Mesa del <?php echo $datos["usuarioSesion"]->nombre?></h3>    


<div class="create_table">
    <div class="side">
    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1])): ?>
    <div>
        <button>
        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_usuario">Usuarios</a>
        </button>
    </div>
    <?php endif ?>

    <!--Todos-->
    <div>
        <button>
        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_publicacion">Publicaciones</a>
        </button>
    </div>

    <!--Todos-->
    <div>
        <button>
        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_evento">Eventos</a>
        </button>
    </div>

    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 3])): ?>
    <!--Creador-->
    <div>
        <button>
        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_extraviado">Extraviados</a>
        </button>
    </div>

    <!--Creador-->
    <div>
        <button>
        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_artefacto">Artefactos</a>
        </button>
    </div>
    <?php endif ?>

    <?php if (tiene_permiso($datos["usuarioSesion"]->id_rol, [1, 2])): ?>
    <!--Lore Master-->
    <div>
        <button>
        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_historia">Historias</a>
        </button>
    </div>

    <!--Lore Master-->
    <div>
        <button>
        <a class="nav-link active" type="button" aria-current="page" href="<?php echo RUTA_URL?>/arquitecto/vista_mundo">Mundos</a>
        </button>
    </div>
    <?php endif ?>
    </div>
    <br>
    <br>


</div>
<?php endif ?>