<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<div class="work_box">
  <div class="artefacto work_card">
    <h2>Artefacto</h2>
    <form action="" method="POST">

        <input type="text" name="titulo" value="<?php echo $this->datos['artefacto']->nombre?>" placeholder="Titulo">

        <br>
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
        <label for="">Infortunio</label>
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
        
        <label for="">Rareza</label>
        <select name="rareza" id="">
        <?php foreach($this->datos["rarezas"] as $rareza):?>
          <option value="<?php echo $rareza->id?>"><?php echo $rareza->nombre?></option>
        <?php endforeach?>
        </select>
        
        <label for=""> Origen</label>
        <textarea name="descripcion" id="" cols="50" rows="80"></textarea>

        <button type="submit" class="verde"><i class="fa fa-save"></i>Guardar</button>
    </form>
  </div>
  <div class="fou work_card">
    <button class="verde"><a href="<?php echo RUTA_URL?>/arquitecto/finish_artefacto/<?php echo $this->datos['artefacto']->id?>">FINALIZAR</a></button>
  </div>
</div>
    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>