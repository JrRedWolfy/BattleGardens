<?php require_once RUTA_APP.'/vistas/inc/test_menu.php' ?>

<div class=fullscreen>

<div class="work_box">
  <div class="one work_card">
    <h2>Origen</h2>

    <div id="mundo_view">
      <img src="<?php echo RUTA_URL?>/img/iconos/humanplanet.png" alt="">
    </div>

    <button class="boton_pag" id="page_a" onclick="anterior()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16"><path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"></path></svg></button>
    <label for="">Startland</label>
    <button class="boton_pag" id="page_s" onclick="siguiente()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16"><path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"></path></svg></button>

    <input type="text" value="1" hidden>



    <hr>

    <label for="">Carisma</label>
    <div class="rating">
      <input id="carInput0" type="radio" name="carInput" value="0" checked hidden>
      <input id="carInput1" type="radio" name="carInput" value="1" hidden>
      <label id="car1" class="star" name="car" value="1" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="carInput2" type="radio" name="carInput" value="2" hidden>
      <label id="car2" class="star" name="car" value="2" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="carInput3" type="radio" name="carInput" value="3" hidden>
      <label id="car3" class="star" name="car" value="3" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="carInput4" type="radio" name="carInput" value="4" hidden>
      <label id="car4" class="star" name="car" value="4" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="carInput5" type="radio" name="carInput" value="5" hidden>
      <label id="car5" class="star" name="car" value="5" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
    </div>

    <br>
    <label for="">Fuerza</label>
    <div class="rating">
      <input id="fueInput0" type="radio" name="fueInput" value="0" checked hidden>
      <input id="fueInput1" type="radio" name="fueInput" value="1" hidden>
      <label id="fue1" class="star" name="fue" value="1" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="fueInput2" type="radio" name="fueInput" value="2" hidden>
      <label id="fue2" class="star" name="fue" value="2" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="fueInput3" type="radio" name="fueInput" value="3" hidden>
      <label id="fue3" class="star" name="fue" value="3" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="fueInput4" type="radio" name="fueInput" value="4" hidden>
      <label id="fue4" class="star" name="fue" value="4" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="fueInput5" type="radio" name="fueInput" value="5" hidden>
      <label id="fue5" class="star" name="fue" value="5" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
    </div>

    <br>
    <label for="">Inteligencia</label>
    <div class="rating">
      <input id="intInput0" type="radio" name="intInput" value="0" checked hidden>
      <input id="intInput1" type="radio" name="intInput" value="1" hidden>
      <label id="int1" class="star" name="int" value="1" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="intInput2" type="radio" name="intInput" value="2" hidden>
      <label id="int2" class="star" name="int" value="2" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="intInput3" type="radio" name="intInput" value="3" hidden>
      <label id="int3" class="star" name="int" value="3" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="intInput4" type="radio" name="intInput" value="4" hidden>
      <label id="int4" class="star" name="int" value="4" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="intInput5" type="radio" name="intInput" value="5" hidden>
      <label id="int5" class="star" name="int" value="5" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
    </div>

    <br>
    <label for="">Desventura</label>
    <div class="rating">
      <input id="forInput0" type="radio" name="forInput" value="0" checked hidden>
      <input id="forInput1" type="radio" name="forInput" value="1" hidden>
      <label id="for1" class="star" name="for" value="1" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="forInput2" type="radio" name="forInput" value="2" hidden>
      <label id="for2" class="star" name="for" value="2" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="forInput3" type="radio" name="forInput" value="3" hidden>
      <label id="for3" class="star" name="for" value="3" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="forInput4" type="radio" name="forInput" value="4" hidden>
      <label id="for4" class="star" name="for" value="4" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
      <input id="forInput5" type="radio" name="forInput" value="5" hidden>
      <label id="for5" class="star" name="for" value="5" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
    </div> 
  </div>

  <div class="two evento work_card">
    <h2>Extraviado</h2>
    <form action="">

        <input type="text" name="nombre" placeholder="Titulo">
        <input type="text" name="titulo" placeholder="Titulo">

        <textarea name="texto" id=""></textarea>

        <button type="submit" class="verde"><i class="fa fa-save"></i>Guardar</button>
    </form>
  </div>

  <div class="thr work_card">
    <h2>Icono</h2>

    <img src="" alt="">

    <hr>
    <h2>Conocidos</h2>
    <button class="verde"><i class="fa fa-plus"></i></button>
    <hr>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa animi accusantium quia voluptatem eum excepturi sequi temporibus minus architecto impedit ullam tenetur blanditiis nam quo, optio unde deserunt praesentium sint ea, nisi autem fugiat. Minus deserunt vitae laudantium at alias.</p>
  </div>

  <div class="fou work_card">
    <button class="verde">FINALIZAR</i></button>
  </div>
</div>
    
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>