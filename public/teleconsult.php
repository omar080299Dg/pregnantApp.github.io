<?php if(session_status()==PHP_SESSION_NONE)
{
  session_start();
}
 require "../elements/header.php";
  ?> 
  <div class="container">
  <h1>Bienveunue dans notre interface <strong>TELE-CONSULTATION</strong></h1>
  <form method="POST", action ="showResult">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Temperature</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="temperature en Celcus" name="temp">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">tension</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="tension" name="tension">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Autre Constat</label>
      <input type="text" class="form-control" id="inputCity" name="const">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Durée de sommeil</label>
      <select id="inputState" class="form-control"name="hour" >
        <option selected>4H</option>
        <option value="5H">5H</option>
        <option value="6H">6H</option>
        <option value="7H">7H</option>
        <option value="8H">8H</option>
      </select>
    </div>
    
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="Mtete">
      <label class="form-check-label" for="gridCheck">
       mal de tete 
      </label>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="Mpied">
      <label class="form-check-label" for="gridCheck">
        mal aux pieds 
      </label>
    </div>
  </div><div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="Mventre">
      <label class="form-check-label" for="gridCheck">
        mal de ventre 
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="Meudeme">
      <label class="form-check-label" for="gridCheck">
       eudeume
      </label>
    </div>
     
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
 
</form>
  </div>








   






  <?php
  if($_POST){
    echo "ok";
  }