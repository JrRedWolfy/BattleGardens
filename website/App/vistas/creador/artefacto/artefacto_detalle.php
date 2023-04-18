<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<div class="work_box">
  <div class="artefacto work_card">
    <h2>Artefacto</h2>
    <form action="" method="POST">

        <input type="text" name="titulo" value="<?php echo $this->datos['artefacto']->nombre?>" placeholder="Titulo">

        <br>
        <label for="">Carisma</label>
        <div class="rating">
          <input id="carismaInput1" type="radio" name="carisma" value="1" hidden>
          <label id="carisma1" class="star" name="carisma" value="1" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="carismaInput2" type="radio" name="carisma" value="2" checked="true" hidden>
          <label id="carisma2" class="star" name="carisma" value="2" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="carismaInput3" type="radio" name="carisma" value="3" hidden>
          <label id="carisma3" class="star" name="carisma" value="3" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="carismaInput4" type="radio" name="carisma" value="4" hidden>
          <label id="carisma4" class="star" name="carisma" value="4" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="carismaInput5" type="radio" name="carisma" value="5" hidden>
          <label id="carisma5" class="star" name="carisma" value="5" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
        </div>

        <br>
        <label for="">Fuerza</label>
        <div class="rating">
          <input id="fuerzaInput1" type="radio" name="fuerza" value="1" hidden>
          <label id="fuerza1" class="star" name="fuerza" value="1" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="fuerzaInput2" type="radio" name="fuerza" value="2" checked="true" hidden>
          <label id="fuerza2" class="star" name="fuerza" value="2" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="fuerzaInput3" type="radio" name="fuerza" value="3" hidden>
          <label id="fuerza3" class="star" name="fuerza" value="3" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="fuerzaInput4" type="radio" name="fuerza" value="4" hidden>
          <label id="fuerza4" class="star" name="fuerza" value="4" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="fuerzaInput5" type="radio" name="fuerza" value="5" hidden>
          <label id="fuerza5" class="star" name="fuerza" value="5" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
        </div>

        <br>
        <label for="">Inteligencia</label>
        <div class="rating">
          <input id="intInput1" type="radio" name="int" value="1" hidden>
          <label id="int1" class="star" name="int" value="1" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="intInput2" type="radio" name="int" value="2" checked="true" hidden>
          <label id="int2" class="star" name="int" value="2" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="intInput3" type="radio" name="int" value="3" hidden>
          <label id="int3" class="star" name="int" value="3" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="intInput4" type="radio" name="int" value="4" hidden>
          <label id="int4" class="star" name="int" value="4" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="intInput5" type="radio" name="int" value="5" hidden>
          <label id="int5" class="star" name="int" value="5" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
        </div>

        <br>
        <label for="">Infortunio</label>
        <div class="rating">
          <input id="forInput1" type="radio" name="for" value="1" hidden>
          <label id="for1" class="star" name="for" value="1" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="forInput2" type="radio" name="for" value="2" checked="true" hidden>
          <label id="for2" class="star" name="for" value="2" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="forInput3" type="radio" name="for" value="3" hidden>
          <label id="for3" class="star" name="for" value="3" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="forInput4" type="radio" name="for" value="4" hidden>
          <label id="for4" class="star" name="for" value="4" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
          <input id="forInput5" type="radio" name="for" value="5" hidden>
          <label id="for5" class="star" name="for" value="5" onclick="set_stat(this)"><i class="fa fa-star"></i></label>
        </div>
        
        <label for="">Rareza</label>
        <select name="rareza" id="">
        <?php foreach($this->datos["rarezas"] as $rareza):?>
          <option value="<?php echo $rareza->id?>"><?php echo $rareza->nombre?></option>
        <?php endforeach?>
        </select>

        <button type="submit" class="verde"><i class="fa fa-save"></i>Guardar</button>
    </form>
  </div>
  <div class="fou work_card">
    <button class="verde">FINALIZAR</i></button>
  </div>
</div>
    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>