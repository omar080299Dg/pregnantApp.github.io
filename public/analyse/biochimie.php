<?php
if(session_status()==PHP_SESSION_NONE)
{
  session_start();
}
require "../vendor/autoload.php";
require '../elements/header.php';

?>
<div class="container">
<h1>BIOCHIMIE</h1>
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Glycémie à jeune</label>
      <input type="text" class="form-control" id="inputEmail4"  placeholder="0.65 - 1.10g/L" name="glycemieAJeune">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Azotémie</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="O.10 - 0.50g/L" name="azotemie">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Créatininémie</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="H: 7 - 13g/L F: 5mmg/L" name="creatininemie">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Glycémie</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="glycemie negative" name="glycemie">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Albuminerie</label>
      <input type="text" class="form-control" id="inputCity" placeholder="albuminerie negative" name="albuminurie">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Cétonurie</label>
      <input type="text" class="form-control" id="inputCity" placeholder="cetonurie negative" name="cetonurie">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Laboratoire</label>
      <input type="text" class="form-control" id="inputCity" placeholder="Laboratoire" name="labo">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">eamil</label>
      <input type="text" class="form-control" id="inputCity" placeholder="email labo" name="email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Date</label>
      <input type="text" class="form-control" id="inputCity" placeholder="date analyse" name="date">
    </div>
    
    
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
  
</form></div>